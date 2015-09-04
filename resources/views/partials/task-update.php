<div class="modal fade" id="task-update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Task</h4>
            </div>
            <form v-on="submit: updateTask">

                <div class="modal-body">

                    <div class="alert alert-danger" v-show="! modalErrors=='' && (task.name == '' || task.description == '' || task.date == '' || task.time == '') ">

                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            <li v-show="task.name == ''">The name field is required.</li>
                            <li v-show="task.description == ''">The description field is required.</li>
                            <li v-show="task.date == ''">The date field is required.</li>
                            <li v-show="task.time == ''">The time field is required.</li>
                        </ul>
                    </div>

                    <input type="hidden" v-el="id" v-model="task.id" />
                    <div class="form-group">
                        <label>Name: <small class="error">*</small></label>
                        <input type="text" v-el="newName" v-model="task.name"  class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Description: <small class="error">*</small></label>
                        <textarea type="text" v-el="newDescription"  v-model="task.description" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Date: <small class="error">*</small></label>
                        <input type="text" v-el="newDate" id="updateDate" v-model="task.date" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Time: <small class="error">*</small></label>
                        <input type="text" v-el="newTime" id="updateTime" v-model="task.time" class="form-control" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" v-on="click: getTask(currentPage, searchKey)">Close</button>
                    <button type="submit" class="btn btn-primary" >Update</button>
                </div>
            </form>
        </div>
    </div>
</div>