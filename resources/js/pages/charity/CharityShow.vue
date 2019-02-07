<template>
    <div>
        <div>
            <div class="media align-items-center py-3 mb-3">
                <div class="media-body">
                    <a v-bind:href="charity.id + '/edit'" class="btn btn-primary btn-sm">Edit</a>&nbsp;
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
                            <td>{{ charity.id }}</td>
                        </tr>
                        <tr>
                            <td>Name:</td>
                            <td>{{ charity.name }}</td>
                        </tr>
                        <tr>
                            <td>Logo Image:</td>
                            <td><img style="width: 80px; height: 80px; object-fit: contain;" v-bind:src="charity.logo" v-if="charity.logo" /></td>
                        </tr>
                        <tr>
                            <td>Background Image:</td>
                            <td><img style="width: 80px; height: 80px; object-fit: contain;" v-bind:src="charity.background_image" v-if="charity.background_image" /></td>
                        </tr>
                        <tr>
                            <td>Balance:</td>
                            <td>{{ charity.balance }}</td>
                        </tr>
                        <tr>
                            <td>Created At:</td>
                            <td>{{ charity.created_at | moment("YYYY-MM-DD") }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script src="./CharityShow.js"></script>