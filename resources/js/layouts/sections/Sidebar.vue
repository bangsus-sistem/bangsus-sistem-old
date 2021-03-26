<template>
    <bsb-sidebar>
        <bsb-sidebar-title>Bangsus Sistem</bsb-sidebar-title>
        <div class="sidebar-items">
            <div
                :class="{
                    'sidebar-item': true,
                    'active': sidebar.active
                }"
                v-for="(sidebar, i) in sidebars"
                :key="i"
            >
                <template v-if="sidebar.children">
                    <a href="#" @click="toggleCollapseSidebar(i)">
                        <bsb-feather-icon :icon="sidebar.icon" :size="20" class="sidebar-icon" />
                        <span class="sidebar-title">
                            {{ sidebar.label }}
                        </span>
                        <template>
                            <bsb-feather-icon icon="chevron-up" class="sidebar-toggle-icon" v-if="sidebar.collapse" />
                            <bsb-feather-icon icon="chevron-down" class="sidebar-toggle-icon" v-else />
                        </template>
                    </a>
                    <div :class="{ 'sidebar-collapse': true, 'active': sidebar.collapse }">
                        <div
                            :class="{
                                'sidebar-collapse-item': true,
                                'active': sidebarChildren.active
                            }"
                            v-for="(sidebarChildren, i) in sidebar.children"
                            :key="i"
                        >
                            <router-link :to="sidebarChildren.route">
                                {{ sidebarChildren.label }}
                            </router-link>
                        </div>
                    </div>
                </template>
                <router-link :to="sidebar.route" v-else>
                    <bsb-feather-icon :icon="sidebar.icon" :size="20" class="sidebar-icon" />
                    <span class="sidebar-title">
                        {{ sidebar.label }}
                    </span>
                </router-link>
            </div>
        </div>
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
                    label: 'Dashboard',
                    icon: 'layout',
                    route: { name: 'dashboard' },
                },
                {
                    label: 'Sistem',
                    icon: 'tool',
                    route: { name: 'system' },
                    children: [
                        { label: 'Role', route: { name: 'system.role' } },
                        { label: 'User', route: { name: 'user' } },
                    ],
                    collapse: false,
                },
                {
                    label: 'Master',
                    icon: 'database',
                    route: { name: 'master' },
                },
            ],
            collapsedIndex: null,
        }
    },
    methods: {
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
        }
    },
    created() {
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
    }
}
</script>