import './bootstrap';
import Alpine from 'alpinejs'


window.Alpine = Alpine

import 'laravel-datatables-vite';
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'
import './../../vendor/power-components/livewire-powergrid/dist/powergrid.css'
import RegulerListing from './components/RegulerListing.vue';



Alpine.start()