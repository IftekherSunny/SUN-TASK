<div class="modal fade" id="task-create" tabindex="-1" role="dialog" aria-labelledby="create-task-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="create-task-label">Create Task</h4>
            </div>
            <form v-on="submit: createTask">

                <div class="modal-body">

                    <div class="alert alert-danger" v-show="! modalErrors=='' ">

                        <strong>Whoops!</strong> There were some problems with your input.
                            <ul>
                                <li v-show="task.name == ''">The name field is required.</li>
                                <li v-show="task.description == ''">The description field is required.</li>
                                <li v-show="task.date == ''">The date field is required.</li>
                                <li v-show="task.time == ''">The time field is required.</li>
                            </ul>
                    </div>

                    <div class="form-group">
                        <label>Name: <small class="error">*</small></label>
                        <input type="text" v-el="name" class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Description: <small class="error">*</small></label>
                        <textarea v-el="description" class="form-control" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Date: <small class="error">*</small></label>
                        <input type="text"  v-el="date" id="createDate"  class="form-control" />
                    </div>

                    <div class="form-group">
                        <label>Time: <small class="error">*</small></label>
                        <input type="text" v-el="time" id="createTime" class="form-control" />
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" v-on="click: clearTask" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>