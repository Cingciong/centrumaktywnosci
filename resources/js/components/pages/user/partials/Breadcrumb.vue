<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  crumbs: {
    type: Array,
    required: true
  }
});
</script>

<template>
  <nav class="mb-10">
    <ul class="flex flex-row gap-2 text-ss-gray-300 text-ss-sm">
      <li v-for="(crumb, index) in props.crumbs" :key="index" class="" :class="{ 'active': index === props.crumbs.length - 1 }">
        <router-link v-if="index !== props.crumbs.length - 1" :to="crumb.href">{{ crumb.text }}</router-link>
        <span v-else>{{ crumb.text }}</span>
        <i v-if="index !== props.crumbs.length - 1" class="fa-solid fa-arrow-right ml-2"></i>
      </li>
    </ul>
  </nav>
</template>
