<template>
    <div>
        <div>
            <div class="media align-items-center py-3 mb-3">
                <div class="media-body">
                    <a v-bind:href="event.id + '/edit'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
                    <a href="javascript:history.back()" class="btn btn-default btn-sm">Back</a>&nbsp;
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table user-view-table m-0">
                    <tbody>
                        <tr>
                            <td>ID:</td>
                            <td>{{ event.id }}</td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td>{{ event.name }}</td>
                        </tr>
                        <tr>
                            <td>Revenue Share:</td>
                            <td>{{ event.rev_share }}</td>
                        </tr>
                        <tr>
                            <td>Balance:</td>
                            <td>{{ event.balance }}</td>
                        </tr>
                        <tr>
                            <td>Created At:</td>
                            <td>{{ event.created_at | moment("YYYY-MM-DD") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script src="./EventShow.js"></script>