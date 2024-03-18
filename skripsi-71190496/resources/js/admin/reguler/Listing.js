import AppListing from '../app-components/Listing/AppListing';


Vue.component('reguler-listing', {
    mixins: [AppListing],
    data() {
        return {
            showFasilitatorFilter: false,
            fasilitatorMultiselect: {},
    
            filters: {
                fasilitator: [],
            },
        }
    },
    
    watch: {
        showFasilitatorFilter: function (newVal, oldVal) {
            this.fasilitatorMultiselect = [];
        },
       fasilitatorMultiselect: function(newVal, oldVal) {
            this.filters.fasilitator = newVal.map(function(object) { return object['key']; });
            this.filter('fasilitator', this.filters.fasilitator);
        }
    }
});