<template>
    <div>
        <div class="card" id="input-form">
            <div class="card-body pb-2">
                <form id="validation-form">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Location Name</label>
                            <input type="text" class="form-control" name="input-location-name" v-model="location.location_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="input-name" v-model="location.name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="input-email" v-model="location.email">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="input-phone" placeholder="01123456789" v-model="location.phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" name="input-address1" placeholder="1234 Main St" v-model="location.address_1">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Address 2</label>
                        <input type="text" class="form-control" name="input-address2" placeholder="Apartment, studio, or floor" v-model="location.address_2">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="input-city" v-model="location.city">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">State</label>
                            <select class="custom-select" name="input-state" v-model="location.state">
                                <option v-for="state in states" v-bind:key="state.id">{{ state.text }}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Zip</label>
                            <input type="text" class="form-control" name="input-zip" v-model="location.postal_code">
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

<script src="./LocationCreate.js"></script>