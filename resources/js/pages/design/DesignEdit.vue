<template>
    <div>
        <div class="card" id="input-form">
            <div class="card-body pb-2">
                <form id="validation-form">
                    <div class="form-group">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="input-name" v-model="design.name">
                    </div>
                    <div class="form-group">
                        <div class="media-body">
                            <label class="form-label">Exported File</label>
                            <label class="custom-file">
                                <input type="file" class="custom-file-input" id="exported-file-input" name="input-exported-file" ref="file1" v-on:change="selectExportedFile">
                                <span class="custom-file-label"></span>
                            </label>
                        </div>
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
<script src="./DesignEdit.js"></script>