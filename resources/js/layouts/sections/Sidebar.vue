<template>
    <bsb-sidebar>
        <bsb-sidebar-title>Bangsus Sistem</bsb-sidebar-title>
        <bsb-sidebar-items>
            <bsb-sidebar-item
                :active="sidebar.active"
                v-for="(sidebar, i) in sidebars"
                :key="i"
            >
                <template v-if="sidebar.children">
                    <a href="#" @click="toggleCollapseSidebar(i)">
                        <bsb-sidebar-item-icon :icon="sidebar.icon" />
                        <bsb-sidebar-item-title :title="sidebar.title" />
                        <bsb-sidebar-item-toggle-icon :collapse="sidebar.collapse" />
                    </a>
                    <bsb-sidebar-collapse
                        :collapse="sidebar.collapse"
                    >
                        <bsb-sidebar-collapse-item
                            :active="sidebarChildren.active"
                            v-for="(sidebarChildren, i) in sidebar.children"
                            :key="i"
                        >
                            <router-link :to="sidebarChildren.route">
                                {{ sidebarChildren.title }}
                            </router-link>
                        </bsb-sidebar-collapse-item>
                    </bsb-sidebar-collapse>
                </template>
                <router-link :to="sidebar.route" v-else>
                    <bsb-sidebar-item-icon :icon="sidebar.icon" />
                    <bsb-sidebar-item-title :title="sidebar.title" />
                </router-link>
            </bsb-sidebar-item>
        </bsb-sidebar-items>
    </bsb-sidebar>
</template>

<script>
export default {
    props: {
        active: {
            type: String,
            default: '',
        }
    },
    data() {
        return {
            sidebars: [
                {
                    title: 'Dashboard',
                    icon: 'layout',
                    route: { name: 'dashboard' },
                },
                {
                    title: 'Sistem',
                    icon: 'tool',
                    route: { name: 'system' },
                    children: [
                        { title: 'Role', route: { name: 'system.role' } },
                        { title: 'User', route: { name: 'user' } },
                    ],
                    collapse: false,
                },
                {
                    title: 'Master',
                    icon: 'database',
                    route: { name: 'master' },
                },
            ],
            collapsedIndex: null,
        }
    },
    methods: {
        initiateSidebar() {
            this.sidebars.forEach((sidebar, i) => {
                if (sidebar.children) {
                    sidebar.children.forEach((sidebarChildren, j) => {
                        if (sidebarChildren.route.name == this.active) {
                            this.toggleCollapseSidebar(i)
                            this.activateSidebar(i, j)
                        }
                    })
                } else {
                    if (sidebar.route.name == this.active) {
                        this.activateSidebar(i)
                    }
                }
            })
        },
        toggleCollapseSidebar(i) {
            if (this.collapsedIndex == i) {
                this.sidebars[i].collapse = false
                this.collapsedIndex = null
            } else {
                this.sidebars[i].collapse = true
                this.collapsedIndex = i
            }
        },
        activateSidebar(i, j = null) {
            this.sidebars[i].active = true
            if (j != null) this.sidebars[i].children[j].active = true
        },
    },
    created() {
        this.initiateSidebar()
    }
}
</script>