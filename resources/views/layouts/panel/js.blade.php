<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="{{path()}}js/bootstrap-datetimepicker.min.js"></script>
<script src="{{path()}}js/jquery.form.min.js"></script>
<script src="{{path()}}js/summernote.js"></script>
<script src="{{path()}}js/toastr.min.js"></script>
<script src="{{path()}}js/master.js"></script>
<script src="{{path()}}nprogress-master/nprogress.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {

        $(".datetime").datetimepicker();

        NProgress.start();

        //When Click Deatils Button
        $('.btn-details').on("click", function () {
            var href = $(this).data('href');
            $.ajax({
                url: href,
                method: "get",
                dataType: "json",
                success: function (result) {
                    if (result.error) {
                        $('#popModal').modal('hide');
                        toastr.error(result.error);
                    } else {
                        $('#popModal').modal('show');
                        $('#popModal .modal-title').html(result.success.name);
                        var tagsHTML = "";
                        var tagsSplit = result.success.tags.split(',');
                        for (var i = 0; i < tagsSplit.length; i++) {
                            tagsHTML += '<span class="badge bg-secondary" style="margin-right: 5px;">' + tagsSplit[i] + '</span>';
                        }
                        var row = '<ul class="list-group">' +
                            '<li class="list-group-item">' + tagsHTML + '</li>' +
                            '<li class="list-group-item">' + result.success.body + '</li>' +
                            '<li class="list-group-item">' + result.success.updated_at + '</li>' +
                            '</ul>';
                        $('#popModal .modal-body').html(row);
                    }
                }
            });
        });

        //When Click Delete Button
        $('.btn_deleted').on("click", function () {
            var iddel2 = $('#iddel2').val();
            var id = $('#iddel').val();
            var url = $('#url').val();
            $.ajax({
                url: url,
                method: "get",
                data: {
                    "id": id,
                    "iddel2": iddel2,
                },
                dataType: "json",
                success: function (result) {
                    toastr.error(result.error);
                    $('.modal').modal('hide');
                    $('#data_Table').DataTable().ajax.reload();
                    if (result.redirect) {
                        window.location.href = result.redirect;
                    }
                }
            });
        });

        //$('.summernote').summernote();

        $(document).ajaxStart(function () {
            NProgress.start();
        });
        $(document).ajaxStop(function () {
            NProgress.done();
        });
        $(document).ajaxError(function () {
            NProgress.done();
        });
        NProgress.done();

    });
    $(function () {
        $('input_tags')
            .on('change', function (event) {
                var $element = $(event.target);
                var $container = $element.closest('.example');

                if (!$element.data('tagsinput')) return;

                var val = $element.val();
                if (val === null) val = 'null';
                var items = $element.tagsinput('items');

                $('code', $('pre.val', $container)).html(
                    $.isArray(val)
                        ? JSON.stringify(val)
                        : '"' + val.replace('"', '\\"') + '"'
                );
                $('code', $('pre.items', $container)).html(
                    JSON.stringify($element.tagsinput('items'))
                );
            })
            .trigger('change');
    });
</script>
