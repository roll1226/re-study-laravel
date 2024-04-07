import { createApp } from "vue/dist/vue.esm-bundler";
import TaskComponentVue from "./vue/components/TaskComponent.vue";

const app = createApp({
    components: {
        "vue-task-component": TaskComponentVue,
    },
});

app.mount("#app");
