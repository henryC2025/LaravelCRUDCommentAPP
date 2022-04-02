<!-- boostrap model -->
<div class="modal fade" id="ajax-comment-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxCommentModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="addEditCommentForm" name="addEditCommentForm" class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Comment</label>
                        <div class="col-sm-12">
                            <textarea class="form-control" id="comment_name" name="comment_name" rows="4" cols="10" placeholder="Enter comment" value="" required=""></textarea>

                            {{-- <input type="text" class="form-control" id="comment" name="comment" placeholder="Enter comment" value="" maxlength="50" required=""> --}}
                        </div>
                    </div>

                    <div class="form-group selectedcomments">


                        <label class="col-sm-5 control-label mt-2">Forename</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="forename" name="forename" placeholder="Enter forename" value="" required="">
                        </div>

                        <label class="col-sm-5 control-label  mt-2">Surname</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname" value="" required="">
                        </div>
                        <label class="col-sm-5 control-label  mt-2">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" value="" required="">
                        </div>
                        <label class="col-sm-5 control-label validation mt-4" id="validationLabel">Validated (1 = ✅ | 0 = ❌)</label>
                        <div class="col-sm-12" id="validationDiv">
                            <select id="validated" name="validated" class="form-control" value="" required="">
                                <option value="0">0</option>
                                <option value="1">1</option>
                            </select>
                        </div>
                        <label class="col-sm-5 control-label style mt-4" id="styleLabel">Style</label>
                        <div class="col-sm-12" id="styleDiv">
                            <select id="style" name="style" class="form-control" value="" required="">
                                <option value="n">n</option>
                                <option value="p">p</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewComment">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
