<template>
    <div>
        <div class="card" id="input-form">
            <div class="card-body pb-2">
                <form id="validation-form">
                    <div class="form-group">
                        <label class="form-label">Location Name</label>
                        <input type="text" class="form-control" name="input-location-name" v-model="location.name">
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

<script src="./LocationEdit.js"></script>