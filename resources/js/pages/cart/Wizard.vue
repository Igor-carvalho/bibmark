<template>
  <div class="wizard">
    <ul class="wizard__steps">
      <li class="wizard__step"
        :class="{
          'active': isMobile ? currentStep === index : currentStep >= index,
          'vgw-mobile': isMobile,
        }"
        :style="wizardStepStyle"
        v-for="(step, index) of steps" :key="index">
        <span class="wizard__step__line" :class="{'vgw-mobile': isMobile}"></span>
        <span class="wizard__step__indicator"></span><br>
        <div style="margin-top:50px;"><span class="wizard__step__label">{{step.label}}</span></div>
      </li>
    </ul>
    <!-- <span 
      class="wizard__arrow visible-xs" 
      :style="{ left: arrowPosition }">
    </span> -->
    <div ref="wizard-body" class="wizard__body" :class="{'vgw-mobile': isMobile}">
      <div :key="currentSlot" class="wizard__body__step">
        <slot :name="currentSlot"></slot>
      </div>
      <div class="wizard__body__actions clearfix">
        <a
          v-if="backEnabled"
          class="wizard__back pull-left"
          @click="goBack()">
          <i class="vgw-icon vgw-prev"></i>
          <span>{{previousStepLabel}}</span> 
        </a>
        <!-- <a
          :class="{'disabled': options[currentStep].nextDisabled}"
          v-if="currentStep != steps.length - 1" class="wizard__next pull-right"
          @click="goNext()">
          <span>{{nextStepLabel}}</span>
          <i class="vgw-icon vgw-next"></i>
        </a> -->
        <div class="form-row d-flex justify-content-between float-right">
            <div class="d-flex align-items-center">
                <a class="join-cta-element d-flex justify-content-md-end" @click="goNext()">
                    <img src="/img/auth/next.png" style="width: 64px; height: 64px;"/>
                    <div class="join-cta-labels d-flex flex-column ml-4">
                        <div class="join-cta-label-desc">Select Shipping</div>
                        <div class="join-cta-label">Continue</div>
                    </div>
                </a>
            </div>
        </div>
        <!-- <a
          :class="{'disabled': options[currentStep].nextDisabled}"
          v-if="currentStep == steps.length - 1" class="wizard__next pull-right final-step" @click="goNext()">
          {{finalStepLabel}}
        </a> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {

  name: 'vue-good-wizard',

  props: {
    steps: {},
    previousStepLabel: {default: 'Back'},
    nextStepLabel: {default: 'Next'},
    finalStepLabel: {default: 'Save'},
    onNext: {},
    onBack: {},
  },

  watch: {
    steps: {
      handler() {
        this.parseOptions();
      },
      immediate: true,
    }
  },

  data () {
    return {
      currentStep: 0,
      isMounted: false,
      resizer: null,
      isMobile: false,
      options: [],
    };
  },
  computed: {
    wizardStepStyle() {
      if (this.isMobile) {
        return {
          width: '100%',
        };
      }

      return {
        width: `${100/this.steps.length}%`,
      };
    },
    mobileArrowPosition() {
      return 'calc(50% - 14px)';
    },
    arrowPosition() {
      if (this.isMobile) {
        return this.mobileArrowPosition;
      }
      var stepSize = 100/this.steps.length;
      var currentStepStart = stepSize * this.currentStep;
      var currentStepMiddle = currentStepStart + (stepSize/2);
      if(this.steps.length == 1)
        return 'calc('+currentStepMiddle+'%)'
      else
        return 'calc('+currentStepMiddle+'% - 14px)'
    },
    currentSlot() {
      return this.steps[this.currentStep].slot;
    },
    backEnabled() {
      return this.currentStep != 0;
    }
  },
  methods: {
    goNext (skipFunction) {
      if (!skipFunction && typeof this.onNext == 'function'){
        if(!this.onNext(this.currentStep)) {
          //returned false. don't do anything
          return;
        }
      }
      if (this.currentStep < this.steps.length-1) {
        this.currentStep++;
      }
    },
    goBack (skipFunction) {
      if (!skipFunction && typeof this.onBack == 'function'){
        if(!this.onBack(this.currentStep)) {
          //returned false. don't do anything
          return;
        }
      }
      if (this.currentStep > 0) {
        this.currentStep--;
      }
    },

    goTo(step) {
      if (Number.isInteger(step)
        && step < this.steps.length
        && step >= 0) {
        this.currentStep = step;
      } 
    },
    
    parseOptions() {
      this.options = [];
      for(let i = 0; i < this.steps.length; i++) {
        this.options.push(this.steps[i].options ? this.steps[i].options : {});
      } 
    },

    handleResize() {
      console.log('handle resize')
      if (this.resizer) {
        clearTimeout(this.resizer);
      }
      this.resizer = setTimeout(() => {
        console.log('resizing...');
        this.isMobile = this.$refs['wizard-body'].clientWidth < 620;
      }, 100);
    },
  },
  mounted() {
    this.isMobile = this.$refs['wizard-body'].clientWidth < 620;
    window.addEventListener('resize', this.handleResize)
  },
  beforeDestroy() {
    window.removeEventListener('resize', this.handleResize)
  }
};
</script>

<style lang="css" scoped>
@font-face {
        font-family: "SFProDisplay";
        src: url("/fonts/SF-Pro-Display-Bold.otf") format('truetype');
    }
/* Utilities
*******************************/

.pull-left{
  float:  left !important;
}

.pull-right{
  float:  right !important;
}

.clearfix::after {
  display: block;
  content: "";
  clear: both;
}

/* Header Steps 
*******************************/
.wizard {
  position: relative;
  width:  100%;
}

.wizard__steps{
  list-style-type:  none;
  text-align: justify;
  -ms-text-justify: distribute-all-lines;
  text-justify: distribute-all-lines;
  padding:  0;
  height:  70px;
  position:  relative;
  max-width: 700px;
  margin-left: auto;
  margin-right: auto;
}

.stretch {
  width: 100%;
  display: inline-block;
  font-size: 0;
  line-height: 0
}

.wizard__step{
  height: 70px;
  vertical-align: bottom;
  display: inline-block;
  text-align: center;
  position:  relative;
}

.wizard__step:not(:first-child) .wizard__step__line{
  position: absolute;
  width:  100%;
  left:  -50%;
  bottom:  12px;
  height:  5px;
  background-color: #d8d8d8;
  margin-bottom: 5px;
}

.wizard__step__indicator{
  box-sizing: content-box;
  display:  block;
  width:  27px;
  height:  27px;
  background-color: #d8d8d8;
  border-radius: 50%;
  border: 0px solid #fff;
  position:  absolute;
  left:  50%;
  margin-left:  -10px;
  bottom:  6px;
  z-index: 1;
}

.wizard__step.active .wizard__step__indicator{
  background-color: #ffe100;
}

.wizard__step.active:not(:first-child) .wizard__step__line{
  background-color: #ffe100; /* green */
}

.wizard__step__label{
  padding-left: 10px;
  font-family: SFProDisplay;
  font-size: 14px;
  font-weight: bold;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  text-align: center;
  color: #444444;
}

/* Wizard body 
*******************************/
.wizard__body{
  margin-top:  30px;
  min-height:  400px;
  /* margin-left:  50px;
  margin-right:  50px; */
  /* border:  1px solid #aebac4; */
  background-color: #fff;
  position: relative;
  border-radius: 5px;
  padding-bottom: 50px;
}

.wizard__body__step{
  padding-top: 16px;
  padding-bottom: 16px;
}

.wizard__arrow{
  position:  absolute;
  display: block;
  width:  30px;
  height:  30px;
  /* border:  1px solid #aebac4; */
  /* top:  85px; height of step + body margin -15 */
  border-top-right-radius: 5px;
  background-color: #fff;
  border-left: none;
  border-bottom:  none;
  transform: rotate(-45deg);
  z-index: 2;
  -webkit-transition: left 0.3s;
  -o-transition: left 0.3s;
  transition: left 0.3s;
}

/* Wizard body 
*******************************/
.wizard__body__actions{
  position:  absolute;
  bottom:  0px;
  /* height:  50px; */
  width:  100%;
  margin-bottom: 35px;
  padding-bottom: 30px;
  float: right ;
  /* border-top:  1px solid #aebac4;
  background-color: #b9c7d2; */
}
@media (max-width: 768px) {
    .wizard__body__actions {
      position: absolute;
      bottom: 20px;
      height: 50px;
      width: 100%;
      margin-bottom: 20px;
      float: right;
    }
}

/* .wizard__body__actions a{
  width:  120px;
  height:  100%;
  display: block;
  background-color: #51abe4;
  color:  white;
  font-weight: bold;
  text-align: center;
  line-height: 50px;
  cursor: pointer;
  -webkit-transition: background-color 0.3s;
  -o-transition: background-color 0.3s;
  transition: background-color 0.3s;
} */
.join-cta-label{
  font-family: SFProDisplay;
  font-size: 24px;
  font-weight: 500;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #000000;
}
.join-cta-label-desc{
  opacity: 0.6;
  font-family: SFProDisplay;
  font-size: 16px;
  font-weight: 500;
  font-style: normal;
  font-stretch: normal;
  line-height: normal;
  letter-spacing: normal;
  color: #000000;
}


.wizard__body__actions a.disabled{
  cursor: not-allowed;
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  opacity: 0.5;
}

.wizard__body__actions a>.vgw-icon, .wizard__body__actions a>span{
  display: inline-block;
  vertical-align: middle;
  position: relative;
}

.wizard__body__actions .vgw-icon::after{
  position: absolute;
  content: "";
  transform: rotate(-45deg);
  width: 8px;
  height: 8px;
  top: 50%;
  margin-top: -5px;
}

.vgw-icon.vgw-next::after{
  border-bottom: 2px solid white;
  border-right: 2px solid white;
}

.vgw-icon.vgw-prev::after{
  border-top: 2px solid white;
  border-left: 2px solid white;
  left: -10px;
}

.wizard__body__actions a:hover{
  /* background-color: #357fae; */
  cursor: pointer;
}

.wizard__body__actions a.final-step{
  background-color: #6eb165;
}

/* mobile */
.wizard__body.vgw-mobile{
  margin-left: 10px;
  margin-right: 10px;
}
.wizard__step.vgw-mobile{
  display: none;
}
.wizard__step .wizard__step__line.vgw-mobile{
  display: none;
}
.wizard__step.active.vgw-mobile{
  display: inline-block;
}

</style>
