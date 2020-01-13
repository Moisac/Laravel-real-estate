<template>
   <div id="app">
  <div class="slides">
    <transition-group 
      name="slide"
      mode="out-in"
      enter-class="slide-in"
      leave-class="slide-out"
      enter-active-class="animated slide-in-active"
      leave-active-class="animated slide-out-active"
    >
      <div
        v-for="index in slides"
        v-if="index == active"
        :key="index"
      >
      <img v-for="index in slides" :key="index" v-if="index == active" class="slide-single-img" :src="slide.img" />
        Slide {{ index }}
      </div>
    </transition-group>
  </div>
  <span
    class="prev"
    @click="move(-1)"
  >
    <i class="fa fa-chevron-left" aria-hidden="true"></i>
  </span>
  <span
    class="next"
    @click="move(1)"
  >
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
  </span>
  <ul class="dots">
    <li 
      v-for="(dot, index) in slides"
      :class="{ active: ++index === active }"
      @click="jump(index)"
    ></li>
  </ul>
</div>
</template>

<script>
  export default {
      name: "home-slider",
        data: function() {
            return {
                slider: [
                  {
                    img: 'https://source.unsplash.com/random/1350x1080'
                  },
                  {
                    img: 'https://source.unsplash.com/random/1350x1080'
                  },
                  {
                    img: 'https://source.unsplash.com/random/1350x1080'
                  }
                ],
                active: 1,
            }
        },

        methods: {
    move(amount) {
      let newActive
      const newIndex = this.active + amount
      if (newIndex > this.slides) newActive = 1
      if (newIndex === 0) newActive = this.slides
      this.active = newActive || newIndex
    },
    jump(index) {
      this.active = index
    },
  }
    }
</script>

<style lang="scss" scoped>


.prev,
.next {
  position: absolute;
  top: 50%;
  width: 50px;
  height: 50px;
  border: 2px solid #ccc;
  color: #ccc;
  border-radius: 50%;
  margin-top: -25px;
  margin-left: 25px;
  cursor: pointer;
  line-height: 48px;
  text-align: center;
  text-indent: -2px;
  transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  
  &:hover {
    background: #ccc;
    color: #fff;
    transform: scale(1.2);
  }
  
  &:active {
    transform: translate(0, 3px) scale(1.2);
  }
}

.next {
  right: 0;
  margin-left: auto;
  margin-right: 25px;
  text-indent: 2px;
}

.dots {
  position: fixed;
  display: block;
  width: 100%;
  text-align: center;
  bottom: 20px;
  
  li {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: #ccc;
    opacity: 0.2;
    display: inline-block;
    margin: 0 3px;
    cursor: pointer;
    transition: opacity 0.4s ease-in-out,width 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid #000;
    
    &.active {
      width: 30px;
      opacity: 1;
      border-radius: 3px;
    }
  }
}

.slides {
  font-size: 40px;
  display: flex;
  height: 100%;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  padding-top: 100px;
  
  @media (min-width: 600px) {
    font-size: 80px;
  }
  
  @media (min-width: 900px) {
    font-size: 140px;
  }
  
  .animated {
    transition: all 400ms;
    position: absolute;
    transform: translate(-50%, -50%);
  }
  
  .slide-in {
    opacity: 0;
    transform: translate(-40%, -50%);
  }
  
  .slide-in-active {
    transition-delay: 150ms;
  }
  
  .slide-out {
    opacity: 1;
  }
  
  .slide-out-active {
    opacity: 0;
    transform: translate(-60%, -50%);
  }
}

.buttons {
  position: absolute;
  top: 10px;
  left: 10px;
}

button {
  padding: 10px;
  outline: none;
  border: none;
  -webkit-appearance: none;
  background: #ccc;
  color: #fff;
  font-weight: bold;
  font-size: 18px;
  cursor: pointer;
  
  &:disabled {
    opacity: 0.2;
    cursor: no-drop;
  }
}
</style>