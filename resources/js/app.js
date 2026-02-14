import './bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

import DataTable from 'datatables.net-dt';
DataTable(window, $); 


import Responsive from 'datatables.net-responsive-dt';
Responsive(window, $); 


import 'datatables.net-dt/css/dataTables.dataTables.css';
import 'datatables.net-responsive-dt/css/responsive.dataTables.css';
