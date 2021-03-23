import Vue from "vue";
import VueMeta from "vue-meta";
import PortalVue from "portal-vue";
import VueClipboard from "vue-clipboard2";
import VueCryptojs from "vue-cryptojs";
import VCalendar from "v-calendar";
import { InertiaApp } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress/src";
import { Popper } from 'popper-vue'
import VTooltip from 'v-tooltip'
import 'popper-vue/dist/popper-vue.css'
 
Vue.component('Popper', Popper)
Vue.config.productionTip = false;
VueClipboard.config.autoSetContainer = true;
Vue.mixin({ methods: { route: window.route } });
Vue.use(InertiaApp);
Vue.use(PortalVue);
Vue.use(VueMeta);
Vue.use(VueClipboard);
Vue.use(VCalendar);
Vue.use(VueCryptojs);
Vue.use(VTooltip)

InertiaProgress.init();

let app = document.getElementById("app");

new Vue({
    metaInfo: {
        titleTemplate: title =>
            title
                ? `${title} - Human Resource Management`
                : "Human Resource Management"
    },
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`@/Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);
