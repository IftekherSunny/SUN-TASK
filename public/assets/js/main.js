$(function() {

    Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('content');

    /**
     * Init jQuery UI
     */
    $( "#createDate" ).datepicker({
        dateFormat: "dd-mm-yy"
    });
    $( "#updateDate" ).datepicker({
        dateFormat: "dd-mm-yy"
    });

    $("#createTime").timepicki();
    $("#updateTime").timepicki();


    /***
     * Application Logic
     */
    new Vue({
        el: "#app",

        data: {
            tasks: [],
            errors: '',
            success: '',
            modalErrors: '',
            loading: true,
            task: {
                id: '',
                name: '',
                description: '',
                date:'',
                time: ''
            },
            searchKey: '',
            currentPage: '',
            totalPage: '',
            loading: true
        },

        ready: function () {
            this.getTask(1);
        },

        methods: {

            getTask: function (number, searchKey) {
                var self = this;
                this.tasks = [];

                Vue.http.get('/api/v1/tasks?item=20&page=' + number + '&searchKey=' + searchKey).success(function (response) {
                    var chunk = [] ;

                    self.totalPage = response.paginator.total_page ;
                    self.currentPage = response.paginator.current_page;

                    if(self.totalPage == 0 && self.searchKey == ''){
                        window.location.assign('/');
                    }

                    while(response.data.length) {
                        if(response.data.length > 4) {

                            for(var i=1; i<=4; i++) {
                                chunk.push (response.data.shift());
                            }
                            self.tasks.push(chunk);
                            chunk = [];
                        }
                        else {
                            var length = response.data.length;

                            for(var i=1; i<= length; i++) {
                                chunk.push (response.data.shift());
                            }
                            self.tasks.push(chunk);
                            chunk = [];
                        }
                    }
                    self.loading = false;
                });
            },

            search: function () {
                this.getTask('',this.searchKey);
            },

            page: function(number) {
                this.getTask(number, this.searchKey);
            },

            clearTask: function () {
                this.$$.name.value = '';
                this.$$.description.value = '';
                this.$$.date.value = '';
                this.$$.time.value = '';
                this.modalErrors = '';
            },

            hideAlertSuccess: function () {
                this.success = '';
            },

            hideAlertError: function () {
                this.errors = '';
            },

            remove: function (id) {
                var self = this;

                Vue.http.delete('/api/v1/tasks/'+id)
                    .success(function (response) {
                        self.errors = '';
                        self.success = response.message;
                        self.getTask(1, self.searchKey);
                    })
                    .error(function (response) {
                        self.success = '';
                        self.errors = response.error;
                    });
            },

            createTask: function (e) {
                e.preventDefault();
                var self = this;

                this.task = {
                    name: this.$$.name.value,
                    description: this.$$.description.value,
                    date: this.$$.date.value,
                    time: this.$$.time.value
                }

                Vue.http.post('/api/v1/tasks/', this.task)
                    .success(function (response) {
                        self.modalErrors = '';

                        $('#task-create').modal('hide');

                        self.clearTask();

                        self.success = response.message;
                        self.getTask(1, self.searchKey);
                    })
                    .error(function (response) {
                        self.success = '';
                        self.modalErrors = response.error;
                    });


            },

            getUpdate: function (task) {
                this.task = task;
                $('#task-update').modal('show');
            },

            updateTask: function (e) {
                e.preventDefault();

                var self = this;

                this.task = {
                    id: this.$$.id.value,
                    name: this.$$.newName.value,
                    description: this.$$.newDescription.value,
                    date: this.$$.newDate.value,
                    time: this.$$.newTime.value
                }

                Vue.http.post('/api/v1/tasks/update', this.task)
                    .success(function (response) {
                        self.modalErrors = '';

                        $('#task-update').modal('hide');

                        self.$$.id.value = '';
                        self.clearTask();

                        self.success = response.message;
                        self.getTask(1, self.searchKey);
                    })
                    .error(function (response) {
                        self.success = '';
                        self.modalErrors = response.error;
                    });
            }
        }
    });

});