

<div class="modal" id="ModalShow">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

      <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Mesaj</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

      <!-- Modal body -->
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('answercontact')}}" method="post" enctype="multipart/form-data" id="edit-form">
                            @csrf
                            <div class="form-group">
                                <label for=""><b>İsim</b></label>
                                <p id="name">dsadsa</p>
                              </div>
                              <div class="form-group">
                                  <label for=""><b>Email</b></label>
                                  <p id="email">fsafsafsa</p>
                              </div>
                              <div class="form-group">
                                  <label for=""><b>Mesaj</b></label>
                                  <p id="message">fsafsafsa fsafs afsafsaf safsaf safsaf safsafsafs afsafsafsafsafsafsa fsafsafsa fsafsafsa</p>
                              </div>
                              <div class="form-group">
                                  <textarea name="editor2" id="editor2"></textarea>
                                  <script>
                                      CKEDITOR.replace( 'editor2' );
                                  </script>
                              </div>
                              <input type="hidden" id="contactId" name="contactId" value="">
                              <button type="button" id="btn-answer" class="btn btn-primary">Yanıtla</button>
                              <button type="submit" id="btn-send" class="btn btn-info">Gönder</button>
                              <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>

                          </form>
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

        $("div[id*='editor2']").hide();
        $('#btn-send').hide();

        var options = {
            'backdrop': 'static'
        };
        $('#ModalShow').modal(options)
    })

    $('#ModalShow').on('show.bs.modal', function() {
        var el = $(".show-item-trigger-clicked"); // See how its usefull right here?
        var row = el.closest(".data-row");

        // get the data
        var id = el.data('contact-id');
        var name = row.children(".contactname").text();
        var email = row.children(".contactemail").text();
        var message = row.children(".contactmessage").text();



        // fill the data in the input fields
        $("#name").text(name);
        $("#email").text(email);
        $("#message").text(message);
        $("#contactId").val(id);

    })


    $(document).on('click', '#btn-answer', function() {
        $(this).addClass('show-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

        $("div[id*='editor2']").show();
        $('#btn-answer').hide();
        $('#btn-send').show();
    })

    // on modal hide
    $('#ModalShow').on('hide.bs.modal', function() {
        $('.show-item-trigger-clicked').removeClass('show-item-trigger-clicked')
        $("#edit-form").trigger("reset");
    })
})


</script>
