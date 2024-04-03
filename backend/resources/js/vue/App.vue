<script setup lang="ts">
import { ref } from "vue";

const count = ref(0);
</script>

<template>
    <div>Count: {{ count }}</div>
    <button @click="count++">Add Count</button>
    <button @click="count--">Remove Count</button>
</template>
