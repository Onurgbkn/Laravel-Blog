

<div class="modal" id="ModalShow">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

      <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Yazı Göster</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

      <!-- Modal body -->
            <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <b><h5 class="card-title" id="showtitle"></h5></b>

                            <textarea name="editor3" id="editor3"></textarea>
                            <script>
                            CKEDITOR.replace( 'editor3');
                            CKEDITOR.instances.editor3.config.readOnly = true;
                            </script>

                        </div>
                    <div class="card-footer">
                        <span id="showcategory">
                        </span>
                        <small class="text-muted  float-right" id="showdate"></small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script>
$(document).ready(function() {

    $(document).on('click', '.show-item', function() {
        $(this).addClass('show-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        var options = {
            'backdrop': 'static'
        };
        $('#ModalShow').modal(options)
    })

    $('#ModalShow').on('show.bs.modal', function() {
        var el = $(".show-item-trigger-clicked"); // See how its usefull right here?
        var row = el.closest(".data-row");

        // get the data

        var title = row.children(".posttitle").text();
        var category = row.children(".postcategory").text();
        var content = row.children(".postcontent").val();
        var date = row.children(".postdate").text();


        $("#showtitle").text(title);
        $("#showcategory").text(category);
        $("#showdate").text(date);
        CKEDITOR.instances.editor3.setData(content);
    })

    // on modal hide
    $('#ModalShow').on('hide.bs.modal', function() {
        $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked')
        $("#showtitle").val('');
        $("#showcontent").val('');
        $("#showcategory").val('');
        $("#showdate").val('');
    })

})


</script>
