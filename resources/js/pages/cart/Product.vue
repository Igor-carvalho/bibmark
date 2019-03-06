<template>
    <div class="cart">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>ITEM</th>
                    <th>QUANTITY</th>
                    <th class="text-center">PRICE</th>
                    <th class="text-center">SUB-TOTAL</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border-bottom-total"><a class="thumbnail pull-left" href="#"><img class="img-responsive" src="/img/products/mens-tee.png" />
                        </a></td>
                    <td class="border-bottom-total">
                        <div class="product">
                            <div class="product-title">Some Product Name</div>
                            <div class="product-sub-title">Some Design Name</div>
                        </div>
                    </td>
                    <td class="border-bottom-total" style="text-align: center;">
                        <div class="center">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <button @click="decrement" type="button" class="btn btn-default btn-number" data-type="minus" data-field="quant[1]">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </span>
                                <div class="counter-box">
                                    <span class="counter">{{ quantity }}</span>
                                </div>
                                <span class="input-group-btn">
                                    <button @click="increment" type="button" class="btn btn-default btn-number" data-type="plus" data-field="quant[1]">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="price text-center border-bottom-total">$30.00</td>
                    <td class="price text-center border-bottom-total">$30.00</td>
                    <td class="border-bottom-total">
                        <span class="remove float-right">
                            <!-- <i class="fa fa-times"></i> -->
                            <a href="javascript:void(0)"><img src="/img/remove_icon.png" class="img-responsive" style="margin-top:5px"/></a>
                        </span></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td class="border-bottom-total"><h5 class="total-label">TOTAL</h5></td>
                    <td class="border-bottom-total">
                        <h5 class="total text-center">$30.00</h5>
                    </td>
                    <td class="text-right border-bottom-total">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    name: 'product',
    data() {
            return {
                quantity: 1
            };
        },
    methods:{
        increment(){
            this.quantity++
        },
        decrement(){
            if(this.quantity > 1){
                this.quantity-- 
            }else{
                this.quantity = 1; 
            }
        }
    }
}
</script>
<style scoped>
@font-face {
        font-family: "SFProText";
        src: url("/fonts/SFProText-Regular.ttf") format('truetype');
    }
thead{
    height: 33px !important ;
    background-color: #f2f2f2;
    }
thead th{
    padding: 5px;
    font-family: SFProText;
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
.table > tbody > tr > td {
    vertical-align: middle;
}
.product-title{
    /* display: block; */
    font-family: SFProText;
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
.product-sub-title{
    /* display: block; */
    font-family: SFProText;
    font-size: 18px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
.price{
    font-family: SFProText;
    font-size: 18px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
.remove .fa{
    color: #626469;
    font-size: 14px;
    font-weight: 600;
}
.cart{
    margin-top:25px;
}
.total-label{
    font-family: SFProText;
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
    margin-bottom: 7px;
    margin-top: 7px;
}
.total{
    font-family: SFProText;
    font-size: 18px;
    font-weight: normal;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
    margin-bottom: 7px;
    margin-top: 7px;
}
.border-bottom-total{
    border-bottom:solid 1px #cccccc;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid #979797;
    padding: 0.2rem 0.6rem;
    font-size: 0.894rem;
    line-height: 1.54;
    border-radius: 0;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}
.counter-box{
    width: 43px;
    height: 30px;
    border-top: solid 1px #979797;
    border-bottom: solid 1px #979797;
}
.counter{
    padding: 3px;
    display: block;
    font-family: SFProText;
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
.btn.fa{
    font-size: 18px;
    font-weight: bold;
    font-style: normal;
    font-stretch: normal;
    line-height: normal;
    letter-spacing: normal;
    color: #000000;
}
@media (min-width: 768px) {
    .table-responsive{
        display: inline-table;
    }
}
@media (max-width: 768px) {
    .counter-box{
        border-right: solid 1px #979797;
        border-left: solid 1px #979797;
        border-top: 0;
        border-bottom: 0;
        width: 34px;
        height: 25px;
        margin-left: 24px;

    }
    .input-group{
        display: inline-block
    }
    .cart{
        margin-top:0;
    }
}
</style>


