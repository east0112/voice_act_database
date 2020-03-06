<template>
  <div id="header-nav">
        <div class="header-nav__content">
            <a href="/">
                <div class="header-nav__item">
                    <span>HOME</span>
                </div>
            </a>
            <a href="/about">
                <div class="header-nav__item">
                    <span>ABOUT</span>
                </div>
            </a>
            <a href="/library">
                <div class="header-nav__item">
                    <span>EVENTS</span>
                </div>
            </a>
            <a href="/tickets">
                <div class="header-nav__item">
                    <span>TICKETS</span>
                </div>
            </a>
            <a href="/calendar">
                <div class="header-nav__item">
                    <span>CALENDAR</span>
                </div>
            </a>
        </div>
        <i class="material-icons header-nav__button" v-on:click="toggleMenuStatus">menu</i>
        <div v-bind:class="{ 'active': status }">aaaaaaaaaaaaaaa</div>
    </div>
</template>

<script>
export default {
  name: '#header-nav',
  data: function(){
    return{
        status: false
        }
  },
  methods: {
    toggleMenuStatus: function (event) {
        this.status = !this.status;
    }
  }
}
</script>

<style>
    #header-nav{
        height:56px;
    }
    .header-nav__content{
        font-size:0.9rem;
        line-height:56px;
        display:flex;
        margin:0 auto;
        width:992px;
    }
    .header-nav__item{
        color:#fff;
        padding:0 20px;
    }
    @media screen and (min-width:993px) { 
    .header-nav__button{
        display:none;
    }    
    }
    @media screen and (max-width:992px) { 
    #header-nav{
        position: relative;
    }
    .header-nav__content{
        display:none;
    }
    .header-nav__button{
        position: absolute;
        right:0.5rem;
        color:#fff;
        line-height:56px;
        font-size:2rem;
        cursor:pointer;
        padding:0 1rem;
    }
}

</style>