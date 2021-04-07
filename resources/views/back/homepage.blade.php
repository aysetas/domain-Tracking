@extends('layouts.master')
@section('title','Anasayfa')
@section('content')
<div class="row" >
    <div class="col-md-6">
        <div class="card card-custom">
            <div class="card-header">
             <div class="card-title">
              <h3 class="card-label">
                Domain Takvimi
              </h3>
             </div>
             <div class="card-toolbar">
              <a href="#" class="btn btn-light-primary font-weight-bold">
              <i class="ki ki-plus "></i> EKLE
              </a>
             </div>
            </div>
            <div class="card-body">
             <div id="kt_calendar"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Domain Listesi</span>
                </h3>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline" data-toggle="tooltip" title="" data-placement="left" >
                        <!--begin::Trigger Modal-->
                        <a href="" class="btn btn-light-primary font-weight-bold"><i class="ki ki-plus "></i>EKLE</a>
                        <!--end::Trigger Modal-->
                        <!--begin::Modal Content-->
                       
                    </div>
                </div>
            </div>
            <div class="card-body">
         
                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="myTable" aria-describedby="kt_datatable_info" role="grid" style="width: 1231px;">
                    <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Record ID: activate to sort column descending" style="width: 56px;"># ID</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Country: activate to sort column ascending" >Başlık</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship City: activate to sort column ascending" >Müşteri</th>
                        <th class="sorting" tabindex="0" aria-controls="kt_datatable" rowspan="1" colspan="1" aria-label="Ship Address: activate to sort column ascending" >Tarih</th>
                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Actions" style="width: 105px;">İŞLEMLER</th>
                    </tr>
                    </thead>
                    <tbody>
               
                        <tr class="odd">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td nowrap="nowrap">
                                <a href="" class="btn btn-sm btn-clean btn-icon" title="Edit details">
                                    <i class="la la-edit"></i>
                                </a>
                                <a href="" class="btn btn-sm btn-clean btn-icon delete-confirm" title="Delete">
                                    <i class="la la-trash"></i>
                                </a>
                            </td>
                        </tr>
                    

                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            <!--end::Body-->
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    var KTCalendarBasic = function() {

return {
    //main function to initiate the module
    init: function() {
        var todayDate = moment().startOf('day');
        var YM = todayDate.format('YYYY-MM');
        var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
        var TODAY = todayDate.format('YYYY-MM-DD');
        var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

        var calendarEl = document.getElementById('kt_calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            themeSystem: 'bootstrap',

            isRTL: KTUtil.isRTL(),

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },

            height: 800,
            contentHeight: 780,
            aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

            nowIndicator: true,
            now: TODAY + 'T09:25:00', // just for demo

            views: {
                dayGridMonth: { buttonText: 'month' },
                timeGridWeek: { buttonText: 'week' },
                timeGridDay: { buttonText: 'day' }
            },

            defaultView: 'dayGridMonth',
            defaultDate: TODAY,

            editable: true,
            eventLimit: true, // allow "more" link when too many events
            navLinks: true,
            events: [
                {
                    title: 'All Day Event',
                    start: YM + '-01',
                    description: 'Toto lorem ipsum dolor sit incid idunt ut',
                    className: "fc-event-danger fc-event-solid-warning"
                },
                {
                    title: 'Reporting',
                    start: YM + '-14T13:30:00',
                    description: 'Lorem ipsum dolor incid idunt ut labore',
                    end: YM + '-14',
                    className: "fc-event-success"
                },
                {
                    title: 'Company Trip',
                    start: YM + '-02',
                    description: 'Lorem ipsum dolor sit tempor incid',
                    end: YM + '-03',
                    className: "fc-event-primary"
                },
                {
                    title: 'ICT Expo 2017 - Product Release',
                    start: YM + '-03',
                    description: 'Lorem ipsum dolor sit tempor inci',
                    end: YM + '-05',
                    className: "fc-event-light fc-event-solid-primary"
                },
                {
                    title: 'Dinner',
                    start: YM + '-12',
                    description: 'Lorem ipsum dolor sit amet, conse ctetur',
                    end: YM + '-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: YM + '-09T16:00:00',
                    description: 'Lorem ipsum dolor sit ncididunt ut labore',
                    className: "fc-event-danger"
                },
                {
                    id: 1000,
                    title: 'Repeating Event',
                    description: 'Lorem ipsum dolor sit amet, labore',
                    start: YM + '-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: YESTERDAY,
                    end: TOMORROW,
                    description: 'Lorem ipsum dolor eius mod tempor labore',
                    className: "fc-event-primary"
                },
                {
                    title: 'Meeting',
                    start: TODAY + 'T10:30:00',
                    end: TODAY + 'T12:30:00',
                    description: 'Lorem ipsum dolor eiu idunt ut labore'
                },
                {
                    title: 'Lunch',
                    start: TODAY + 'T12:00:00',
                    className: "fc-event-info",
                    description: 'Lorem ipsum dolor sit amet, ut labore'
                },
                {
                    title: 'Meeting',
                    start: TODAY + 'T14:30:00',
                    className: "fc-event-warning",
                    description: 'Lorem ipsum conse ctetur adipi scing'
                },
                {
                    title: 'Happy Hour',
                    start: TODAY + 'T17:30:00',
                    className: "fc-event-info",
                    description: 'Lorem ipsum dolor sit amet, conse ctetur'
                },
                {
                    title: 'Dinner',
                    start: TOMORROW + 'T05:00:00',
                    className: "fc-event-solid-danger fc-event-light",
                    description: 'Lorem ipsum dolor sit ctetur adipi scing'
                },
                {
                    title: 'Birthday Party',
                    start: TOMORROW + 'T07:00:00',
                    className: "fc-event-primary",
                    description: 'Lorem ipsum dolor sit amet, scing'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: YM + '-28',
                    className: "fc-event-solid-info fc-event-light",
                    description: 'Lorem ipsum dolor sit amet, labore'
                }
            ],

            eventRender: function(info) {
                var element = $(info.el);

                if (info.event.extendedProps && info.event.extendedProps.description) {
                    if (element.hasClass('fc-day-grid-event')) {
                        element.data('content', info.event.extendedProps.description);
                        element.data('placement', 'top');
                        KTApp.initPopover(element);
                    } else if (element.hasClass('fc-time-grid-event')) {
                        element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                    } else if (element.find('.fc-list-item-title').lenght !== 0) {
                        element.find('.fc-list-item-title').append('<div class="fc-description col-sm">' + info.event.extendedProps.description + '</div>');
                    }
                }
            }
        });

        calendar.render();
    }
};
}();

jQuery(document).ready(function() {
KTCalendarBasic.init();
});
</script>

//dataTable
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            columns: [
                null,
                null,
                null,
                null,
                { orderable: false }
            ],
            "language": {
                "lengthMenu": "_MENU_ sayfa başına adet",
                "zeroRecords": "Kayıt bulunamadı!",
                "info": "_PAGE_ sayfasındasın.",
                "infoEmpty": "Kayıt Bulunamadı!",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search":         "Arama:",
                "paginate": {
                    "first":      "İlk",
                    "last":       "Son",
                    "next":       "Sonraki",
                    "previous":   "Önceki"
                }
            },
            responsive: true

        });
    } );
</script>
@endsection
    
