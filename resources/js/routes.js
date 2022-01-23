import SearchPage from "./pages/SearchPage";
import VueRouter from "vue-router";

const routes = [
	{
		path: "/",
		component: SearchPage,
		name: "search-page",
	},
];

const router = new VueRouter({
	mode: "history",
	routes,
});

export default router;
