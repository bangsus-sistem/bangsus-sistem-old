
const queryMethods = {

    /**
    | --------------------------------------------------------------
    | QUERY FUNCTIONALITIES
    | --------------------------------------------------------------
    | Query functionalities is specified as the top methods.
    | This method can used pretty much everywhere, and also
    | considered as the backbone.
    */

    /**
     * Request fetcher functionality.
     * 
     * @param  {String} index
     * @param  {mixed}  def
     * @param  {mixed}  allowed
     * @param  {mixed}  callback
     * @return {mixed}
     */
    request(index, def = null, allowed = '*', callback = null) {
        // We would allow dot for deep object fetcher.
        // Fetch the raw value from the vue router plugin.
        let value
        index.split('.').forEach((i, key) => {
            if (key == 0) {
                value = this.$route.query[i]
            } else {
                value = value?.[i]
            }
        })

        // If the value is undefined, then we set the value to the specified
        // default value in the def parameter.
        if (value == undefined) value = def

        // Check if the callback exists, and if it does then we must run the
        // callback with the value as the paramter.
        // It is powerful enough so that we can manipulate the value of the
        // query without any pain.
        value = callback !== null ? callback(value) : value

        // The '*' wildcard is a symbolic parameter that's basically saying,
        // it allows any value to be specified.
        // If it's not '*', then we've got to check the value of the query
        // based on the allowed value specified in the allowed parameter
        // itself.
        if (allowed != '*') {

            // If the allowed is not yet an array, then we must make it an
            // array with the allowed value itself as the first value of the
            // array.
            if (typeof allowed == 'string') {
                allowed = [allowed]
            }

            // Check if the value pass the allowed value, and if it doesn't,
            // then we change the value to the first index of the allowed.
            if (allowed.indexOf(value) === -1) {
                value = allowed[0]
            }
        }

        return value
    },

    /**
     * Get the value of requested page.
     * 
     * @param  {mixed}  index
     * @return {Number}
     */
    requestPage(index = null) {
        return index != null
            ?   this.request(index + '.page', 1, '*', (val) => parseInt(val))
            :   this.request('page', 1, '*', (val) => parseInt(val))
    },

    /**
     * Get the value of requested count.
     * 
     * @param  {mixed}  index
     * @return {Number}
     */
    requestCount(index = null) {
        return index != null
            ?   this.request(index + '.count', 10, this.meta.counts, (val) => parseInt(val))
            :   this.request('count', 10, this.meta.counts, (val) => parseInt(val))
    },

    /**
     * Get the value of sort index, or return a default value.
     * 
     * @param  {mixed} def
     * @param  {mixed} index
     * @return {mixed}
     */
    requestSort(def, index = null) {
        // Get the sorts value based on index of sortOrders meta property
        // specified.
        let sorts = index != null
            ?   this.meta[index].sortOrders.map((obj) => obj.index)
            :   this.meta.sortOrders.map((obj) => obj.index)

        // Fetch the value
        return index != null
            ?   this.request(index + '.sort', def, sorts)
            :   this.request('sort', def, sorts)
    },

    /**
     * Get the value of order, which could be either 'asc' or 'desc'.
     * 
     * @param  {mixed}  index
     * @return {mixed}
     */
    requestOrder(index = null) {
        return index != null
            ?   this.request(index + '.order', 'asc', ['asc', 'desc'])
            :   this.request('order', 'asc', ['asc', 'desc'])
    },

    /**
     * Set query data.
     * 
     * @param  {Object} obj
     * @param  {mixed} index
     * @return {void}
     */
    setQueryData(obj, index = null) {
        Object.keys(obj).forEach(key => {
            let args
            if (index != null) {
                args = [index + '.' + key, ...obj[key]]
                this.query[index][key] = this.request(...args)
            } else {
                let args = [key, ...obj[key]]
                this.query[key] = this.request(...args)
            }
        })
    },

    /**
     * Set the requested page value directly.
     * 
     * @param  {mixed}  index
     * @return {void}
     */
    setQueryPage(index = null) {
        if (index != null) {
            this.query[index].page = this.requestPage(index)
        } else {
            this.query.page = this.requestPage()
        }
    },

    /**
     * Set the requested count value directly.
     * 
     * @param  {mixed}  index
     * @return {void}
     */
    setQueryCount(index = null) {
        if (index != null) {
            this.query[index].count = this.requestCount(index)
        } else {
            this.query.count = this.requestCount()
        }
    },

    /**
     * Set the requested sort value directly.
     * 
     * @param  {Object}  def
     * @param  {mixed}  index
     * @return {void}
     */
    setQuerySort(def, index) {
        if (index != null) {
            this.query[index].sort = this.requestSort(def, index)
        } else {
            this.query.sort = this.requestSort(def)
        }
    },

    /**
     * Set the requested order value directly.
     * 
     * @param  {mixed}  index
     * @return {void}
     */
    setQueryOrder(index) {
        if (index != null) {
            this.query[index].order = this.requestOrder(index)
        } else {
            this.query.order = this.requestOrder()
        }
    },

    /**
     * Set the query metas simultaneously.
     * 
     * @param  {mixed}  index
     * @return {void}
     */
    setQueryMetas(index = null) {
        this.setQueryPage(index)
        this.setQueryCount(index)
        this.setQuerySort([], index)
        this.setQueryOrder(index)
    },

    /**
     * Set query.
     * 
     * @param  {mixed}  index
     * @param  {Object} obj 
     */
    setQuery(obj, index = null) {
        this.setQueryData(obj, index)
        this.setQueryMetas(index)
    },

    /**
     * Toggle the query order value.
     * 
     * @param  {mixed}  index
     * @return {void}
     */
    toggleQueryOrder(index = null) {
        if (index != null) {
            this.query[index].order = this.query[index].order == 'asc' ? 'desc' : 'asc'
        } else {
            this.query.order = this.query.order == 'asc' ? 'desc' : 'asc'
        }
    },
    
    /**
     * Change the sort and order query value, and call
     * the search method if necessary.
     * 
     * @param  {String} sort 
     * @param  {Boolean} callSearch 
     * @param  {mixed}  index
     * @return {void}
     */
    changeSortOrder(sort, callSearch = true, index = null) {
        if (index != null) {
            // If the sort value is still the same, then we just need to
            // toggle the order value.
            // Else, we need to reassign the sort value and set the query
            // order to 'asc'.
            if (this.query[index].sort == sort) {
                this.toggleQueryOrder(index)
            } else {
                this.query[index].sort = sort
                this.query[index].order = 'asc'
            }
        } else {
            // If the sort value is still the same, then we just need to
            // toggle the order value.
            // Else, we need to reassign the sort value and set the query
            // order to 'asc'.
            if (this.query.sort == sort) {
                this.toggleQueryOrder()
            } else {
                this.query.sort = sort
                this.query.order = 'asc'
            }
        }

        // If the callSearch is specified to true then we will call
        // the search method.
        if (callSearch) this.search(index)
    },

    /**
     * Refreshing route with defined query.
     * 
     * @return {void}
     */
    refreshRouteWithQuery() {
        // Push the router, and we catch the error without doing anything to prevent
        // the Vue Router console logging the duplicate navigation error.
        this.$router.push({ name: this.$route.name, query: this.query }).catch(() => {})
    },

    // --------------------------------------------------------------

}

export default queryMethods
