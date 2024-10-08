<x-app-layout title="{{ $title }}">
    @push('css')
        <style>

            .barcode-container {
                position: relative;
                /* display: inline-block; */
            }

            .popup {
                display: none;
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: rgb(176, 255, 198);
                border: 1px solid #ccc;
                width: 300px;
                height: auto;
                /* Adjusting height to fit content */
                padding: 5px;
                z-index: 1;
                overflow-x: auto;
                /* Making content horizontally scrollable */
                white-space: nowrap;
                /* Preventing content from wrapping */
            }


            .barcode-container:hover .popup {
                display: block;
            }
    </style>
    @endpush
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <x-page-heading title="{{ __('Product Information') }}"></x-page-heading>
        {{-- <x-right-side-button link="{{ route('department.create') }}" title="Create"></x-right-side-button> --}}
        <x-alert></x-alert>
        <div class="container-fluid card mt-3">
            <div class="row card-body pb-0">
                <div class="col-lg-12 col-sm-12 col-md-12">
                <button class="btn btn-warning" id="productModalButton">Delete Product</button>
                <button class="btn btn-secondary" id="updateCtIdButton">Update CT.ID</button>
                <button class="btn btn-primary" id="printButton">Print</button>
                </div>
            </div>
            <div class="row card-body">
                <div class="col-lg-12 col-sm-12 col-md-12">
                    <div class="table-responsive">
                        <table id="dataTable" class="table">
                          <thead>
                            <tr>
                                <th></th>
                                <th>CSDID</th>
                                <th>MAITOU</th>
                                <th>BillId</th>
                                <th>Product Name</th>
                                <th>Photo</th>
                                <th>Photo</th>
                                <th>Photo</th>
                                <th>Photo</th>
                                <th>Barcode</th>
                                <th>WareHouse</th>
                                <th>Option</th>
                                <th>Type</th>
                                <th>CTNs</th>
                                <th>Weight</th>
                                <th>Total Weight</th>
                                <th>L</th>
                                <th>W</th>
                                <th>H</th>
                                <th>T.Cube</th>
                                <th>Date/Time</th>
                                <th>Remark</th>
                                <th>CT ID</th>
                                <th>Log Status</th>
                                <th>LC</th>
                                <th>Print</th>
                                <th>COST</th>
                                <th>DBT</th>
                                <th>NTF.CS</th>
                                <th>PAISONG SIJI</th>
                                <th>SERVEY</th>
                                <th style="display:none;">SERVEY</th>
                            </tr>
                          </thead>
                          <tbody class="main-table">
                          </tbody>
                        </table>
                      </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Delete Repack Product</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form id="productForm">

                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-12">
                                        <table id="tablehead" class="table table-bordered">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" class="btn-close"
                                data-dismiss="modal" aria-label="Close">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="productModalUpdateCtId" tabindex="-1" aria-labelledby="productModalLabel"
        aria-hidden="true">
        <div class="modal-dialog custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Edit CT.ID</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form id="productFormUpdateCtId">

                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-12">
                                        <table id="thead" class="table table-bordered">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col mb-12">
                            <label for="remarks" class="form-label">CT. ID</label>
                            <input type="text" class="form-control" id="ctid" name="ctid">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update CT.ID</button>
                            <button type="button" class="btn btn-secondary" class="btn-close"
                                data-dismiss="modal" aria-label="Close">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="print" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog custom-width" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Print</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <!-- Form inside the modal -->
                    <form id="productPrintRequest">

                        <div class="row">
                            <div class="col">
                                <div class="row">
                                    <div class="col mb-12">
                                        <table id="thead-print" class="table table-bordered">
                                            <tr>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                                <th>Barcode</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Print</button>
                            <button type="button" class="btn btn-secondary" class="btn-close"
                                data-dismiss="modal" aria-label="Close">Close</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

         <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="
        max-width: 650px;
    ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Product Image</h5>
                    <button type="button" class="close"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">
                            ×
                        </span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img width="800px" height="800px" src="" alt="Product Image"
                        class="img-fluid modal-image-content">
                </div>
            </div>
        </div>
    </div>

    <div id="popup_status"
    style="display: none; position: absolute; background-color: #f9f9f9; border: 1px solid #ccc; padding: 10px;">
</div>


    @push('scripts')

<script type="text/javascript" charset="utf8" src="stopwatch.js"></script>
<script type="text/javascript" charset="utf8" src="{{ asset('delete-repack.js') }}"></script>
<script>
    var serverTime = '{{ now() }}';
    var serverTimeDate = new Date(serverTime);
    // console.log(serverTime);
    // console.log(serverTimeDate);

    var countdownInterval = setInterval(function() {
        serverTimeDate.setSeconds(serverTimeDate.getSeconds() + 1);
    }, 1000);
</script>

        <script>
            $(document).ready(function() {

                $('#dataTable').DataTable({
                    "pageLength": 50,
                    "lengthMenu": [[50, 100, 150, 200, -1], [50, 100, 150, 200, "All"]],
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("repackProductsData") }}',
                    'fnRowCallback': function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                        $(nRow).find('td').eq(21).attr('contenteditable', true);
                        $(nRow).find('td').eq(21).addClass('editable-remarks');
                        $(nRow).find('td').eq(21).attr('data-id', $(nRow).find('td').find('.product-id').val());
                    },
                    columns: [
                        { data: 'checkbox', name: 'checkbox' },
                        { data: 'csd_id', name: 'csd_id' },
                        { data: 'maitou', name: 'maitou' },
                        { data: 'bill_id', name: 'bill_id'},
                        { data: 'product_name', name: 'product_name'},
                        { data: 'photo1', name: 'photo1'},
                        { data: 'photo2', name: 'photo2'},
                        { data: 'photo3', name: 'photo3'},
                        { data: 'photo4', name: 'photo4'},
                        { data: 'sku', name: 'sku'},
                        { data: 'warehouse', name: 'warehouse',
                            render: function(data, type, full, meta)
                            {
                                if(data == '义乌')
                                {
                                return '<span style="color:red">' + data + '</span>';
                                }
                                else if(data == '广州'){
                                return '<span style="color:green">' + data + '</span>';
                                }
                                else if(data ==  '深圳')
                                {
                                return '<span style="color:blue">' + data + '</span>';
                                }
                                return '';
                            }
                        },
                        { data: 'option', name: 'option',
                        render: function(data, type, full, meta) {
                                let imageUrl = '';
                                if(data == 'SEA') {
                                    imageUrl = '{{ asset("assets/images/icons/sea.jpeg") }}';
                                } else if(data == 'EK') {
                                    imageUrl = '{{ asset("assets/images/icons/ek.jpeg") }}';
                                } else if(data == 'AIR') {
                                    imageUrl = '{{ asset("assets/images/icons/air.jpeg") }}';
                                }

                                if(imageUrl) {
                                    return '<img src="' + imageUrl + '" style="height: 50px;">';
                                }
                                return '';
                            }
                        },
                        { data: 'type', name: 'type'},
                        { data: 'tpcs', name: 'tpcs'},
                        { data: 'weight', name: 'weight'},
                        { data: 'total_weight', name: 'total_weight'},
                        { data: 'length', name: 'length'},
                        { data: 'width', name: 'width'},
                        { data: 'height', name: 'height'},
                        { data: 't_cube', name: 't_cube'},
                        { data: 'created_at', name: 'created_at'},
                        { data: 'remarks', name: 'remarks'},
                        { data: 'ct_id', name: 'ct_id'},
                        { data: 'log_status', name: 'log_status'},
                        { data: 'lc', name: 'lc'},
                        { data: 'print', name: 'print'},
                        { data: 'cost', name: 'cost'},
                        { data: 'dbt', name: 'dbt'},
                        { data: 'ntf_cs', name: 'ntf_cs'},
                        { data: 'paisong_siji', name: 'paisong_siji'},
                        { data: 'survey', name: 'survey'},
                        { data: 'hidden_fields', name: 'hidden_fields'},

                    ]
                });

            });

            $(document).on('click', '.view-image', function() {
            $('#imageModal img').attr('src', '');
            var imageUrl = "{{ url('/') }}" + $(this).attr('data-image');
            $('#imageModal img').attr('src', imageUrl);
            $('#imageModal').modal('show');
            console.log('lets see' , $(this).attr('data-image') , imageUrl);
        });
         $(document).ready(function () {
            $('#imageModal').on('show.bs.modal', function() {
                if( $("#repackModal").hasClass('show') ){
                    $(this).css("z-index", "1111");
                }
            });
         });



            function showPopup(x, y, selectedId) {
            var popup = $("#popup_status");
            popup.html(selectedId);
            popup.css({
                display: "block",
                top: (y + 10) + "px",
                left: (x + 10) + "px"
            });
        }

        function hidePopup() {
            $("#popup_status").css("display", "none");
        }

         $(document).on('blur', '.editable-remarks', function () {
            var $this = $(this);
            // if ($this.text().trim() === originalContent) {
            //     return;
            // }

            $(this).addClass('editing');;

            // clearTimeout(editingTimeout);

            // // Use a timeout to delay the API call after the user finishes editing
            // editingTimeout = setTimeout(function() {
            var id = $this.data('id');
            var value = $this.text();

            // Get the CSRF token value from the meta tag
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'PATCH',
                url: '/update-repack-remarks/' + id,
                data: {
                    remarks: value,
                    _token: csrfToken // Include the CSRF token in the data
                },
                success: function (response) {
                    // alert(response.message);
                    var $editableLink = $('.editable-link[data-id="' + id + '"]');
                    $editableLink.text(value);
                    $editableLink.attr('href',
                        'https://dhl.com/index.php?route=account%2Fshipping&search=' +
                        value.trim());

                    $this.removeClass('editing')
                },
                error: function (error) {
                    console.log(error);
                    // alert("Error saving data please try again");
                }
            });
            // }, 1500); // Adjust the timeout duration as needed

    });

    $(document).ready(function(){

            // Event listener for dynamically generated elements
    $(document).on('mouseenter', '.editable-log_status', function(event) {
        var description = $(this).find('option:selected').attr('data-description');
        var x = event.clientX;
        var y = event.clientY;
        showPopup(x, y, description);
    }).on('mouseleave', '.editable-log_status', function() {
        hidePopup();
    });


        });






        </script>


    @endpush

</x-app-layout>
