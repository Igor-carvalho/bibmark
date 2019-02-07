<template>
    <div>
        <div class="card" id="input-form">
            <div class="card-body pb-2">
                <form id="validation-form">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="input-name" v-model="user.name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="input-email" v-model="user.email">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="input-phone" v-model="user.phone">
                    </div>
                </form>
            </div>
        </div>

        <div class="text-right mt-3">
            <button type="button" class="btn btn-primary ladda-button" data-style="expand-left" v-on:click="save">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default" onclick="window.history.go(-1); return false;">Cancel</button>
        </div>
    </div>
</template>

<script src="./UserEdit.js"></script>