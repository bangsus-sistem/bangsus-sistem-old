<template>
    <div class="d-flex justify-content-between">
        <div class="col p-0 m-0 text-truncate">
            <slot name="content" />
        </div>
        <div class="col p-0 my-auto text-right align-items-middle">
            <slot name="right" />
        </div>
    </div>
</template>