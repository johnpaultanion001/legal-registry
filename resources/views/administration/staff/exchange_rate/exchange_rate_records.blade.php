<div class="table-responsive">
    <table class="table align-items-center table-flush datatable-country-records display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>
                    Country
                </th>
                <th>
                    Settlement
                </th>
                <th>
                    Rate
                </th>
                <th>
                    Created At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $country)
                <tr data-entry-id="{{ $country->id }}">
                    <td>
                        {{ $country->country->country ?? '' }}
                    </td>
                    <td>
                        
                        {{ $country->country->exchange ?? '' }} {{ $country->country->code ?? '' }}
                    </td>
                    <td>
                        {{ $country->exchange ?? '' }}
                    </td>
                    <td>
                        {{ $country->created_at->format('M j , Y h:i A') }}
                    </td>
                  
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.extend(true, $.fn.dataTable.defaults, {
        pageLength: 100,
        });

        var table = $('.datatable-country-records:not(.ajaxTable)').DataTable({ buttons: dtButtons });
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });

    });
</script>