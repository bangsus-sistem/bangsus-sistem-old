# Note on March 3rd 2021

1.  Use attach on pivot to insert new record, detach to delete.
1.  Use sync to make sure that the input is the exact same as the given array.
1.  Use syncWithoutDetaching to make sure the unspecified ids that exist somewhere in the record do not get detached.
1.  Use toggle to toggle the specified array of ids. If it's attached then it would be detached, and the same goes for the other way round.