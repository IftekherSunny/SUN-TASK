<div id="content">
    <div class="container">

        <div class="alert alert-danger" v-show="! errors=='' && totalPage != 0 ">
            <button type="button" class="close" v-on="click: hideAlertDanger">
                <span aria-hidden="true">&times;</span>
            </button>
             {{ errors }}
        </div>

        <div class="alert alert-success" v-show="! success=='' && totalPage != 0 ">
            <button type="button" class="close" v-on="click: hideAlertSuccess">
                <span aria-hidden="true">&times;</span>
            </button>
             {{ success }}
        </div>

        <div class="row" v-repeat="chunkTask: tasks">

            <div class="col-md-3" v-repeat="task: chunkTask">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-8">
                                {{ task.name }}
                            </div>
                            <div class="col-sm-4">
                                <div class="pull-right">
                                    <span class="glyphicon glyphicon-pencil  pointer"  aria-hidden="true" v-on="click: getUpdate(task)"></span>
                                    <span class="glyphicon glyphicon-remove pointer" aria-hidden="true" v-on="click: remove(task.id)"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">

                        <p>{{ task.description }}</p>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-6 panel-footer-date">
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                                {{ task.date }}
                            </div>
                            <div class="col-lg-6">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                {{ task.time }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <?php include_once('pagination.php') ?>
    </div>
</div>