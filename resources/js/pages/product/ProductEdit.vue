<template>
    <div>
        <div class="card" id="input-form">
            <div class="card-body pb-2">
                <form id="validation-form">
                    <div class="form-group media" style="min-height:1px">
                        <div class="ui-bg-cover" style="width: 80px;height: 80px;">
                            <img id="product-image" style="width: 100%; height: 100%; object-fit: contain;" v-bind:src="product.image" alt="image" v-if="product.image || image" />
                        </div>
                        <div class="media-body ml-3">
                            <label class="form-label">
                                Image
                            </label>
                            <label class="custom-file mt-3">
                                <input type="file" class="custom-file-input" id="image-input" ref="file1" v-on:change="selectImage">
                                <span class="custom-file-label"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="input-name" v-model="product.name">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" rows="5" name="input-description" v-model="product.description"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">$</div>
                            </div>
                            <input type="text" class="form-control" name="input-price" v-model="product.price">
                        </div>
                    </div>
                    <div class="form-group" v-if="product.id">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" name="input-slug" v-model="product.slug">
                    </div>
                    <div class="form-group" v-if="product.id">
                        <label class="form-label">Available</label>
                        <label class="switcher">
                            <input type="checkbox" class="switcher-input" :checked="product.is_available" v-model="product.is_available">
                            <span class="switcher-indicator">
                                <span class="switcher-yes"></span>
                                <span class="switcher-no"></span>
                            </span>
                        </label>
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
<script src="./ProductEdit.js"></script>