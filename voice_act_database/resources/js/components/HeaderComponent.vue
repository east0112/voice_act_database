<template>
  <div id="header-nav">
        <div class="header-nav__content" v-bind:class="{ 'active': status }" v-on:click="toggleMenuStatus">
            <div class="header-nav__list">
                <a href="/">
                    <div class="header-nav__item header-nav__item--first">
                        <span>HOME</span>
                    </div>
                </a>
                <a href="/about">
                    <div class="header-nav__item header-nav__item--second">
                        <span>ABOUT</span>
                    </div>
                </a>
                <a href="/library">
                    <div class="header-nav__item header-nav__item--third">
                        <span>EVENTS</span>
                    </div>
                </a>
                <a href="/tickets">
                    <div class="header-nav__item header-nav__item--forth">
                        <span>TICKETS</span>
                    </div>
                </a>
                <a href="/calendar">
                    <div class="header-nav__item header-nav__item--fifth">
                        <span>CALENDAR</span>
                    </div>
                </a>
                <div class="header-nav__search">
                    <form action="/library" method="GET">
                        <input name="search" type="text" class="form-control" placeholder="検索ワードを入力">
                    </form>
                </div>
            </div>
        </div>
        <i class="material-icons header-nav__button header-nav__button--inactive" v-if="!status" v-bind:class="{ 'active': status }" v-on:click="toggleMenuStatus">menu</i>
        <i class="fas fa-times header-nav__button header-nav__button--active" v-else v-on:click="toggleMenuStatus"></i>
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
        if(window.innerWidth <= 992){
            this.status = !this.status;
        }
    }
  }
}
</script>

<style ang="scss">
    #header-nav{
        height:56px;
    }
    .header-nav__content{
        font-size:0.9rem;
        line-height:56px;
        margin:0 auto;
        width:992px;
    }
    
    @media screen and (min-width:993px) { 
        .header-nav__button{
            display:none;
        }    
        .header-nav__list{
            display:flex;
        }
        .header-nav__item{
            color:#fff;
            padding:0 20px;
        }
    }
    @media screen and (max-width:992px) { 
        #header-nav{
            position: relative;
        }
        .header-nav__content{
            display:none;
        }
        .header-nav__content.active{
            display:block;
            width:100vw;
            height:100vh;
            background-color:#fff;
            position:absolute;
            animation-duration: 0.5s;
            animation-name: fade-in;
            -moz-animation-duration: 0.5s;
            -moz-animation-name: fade-in;
            -webkit-animation-duration: 0.5s;
            -webkit-animation-name: fade-in;
        }
        .header-nav__list{
            transform:translateY(-50%);
            margin:50vh auto 0;
        }
        .header-nav__item--first{
            -webkit-animation: hvr-wobble-vertical 0.8s ease 0s forwards;
            animation: hvr-wobble-vertical 0.8s ease 0s forwards;
        }
        .header-nav__item--second{
            -webkit-animation: hvr-wobble-vertical 0.8s ease 0.05s forwards;
            animation: hvr-wobble-vertical 0.8s ease 0.1s forwards;
        }
        .header-nav__item--third{
            -webkit-animation: hvr-wobble-vertical 0.8s ease 0.1s forwards;
            animation: hvr-wobble-vertical 0.8s ease 0.2s forwards;
        }
        .header-nav__item--forth{
            -webkit-animation: hvr-wobble-vertical 0.8s ease 0.15s forwards;
            animation: hvr-wobble-vertical 0.8s ease 0.3s forwards;
        }
        .header-nav__item--fifth{
            -webkit-animation: hvr-wobble-vertical 0.8s ease 0.20s forwards;
            animation: hvr-wobble-vertical 0.8s ease 0.4s forwards;
        }

        .header-nav__button--inactive{
            position: absolute;
            right:0.5rem;
            color:#fff;
            line-height:56px;
            font-size:2rem;
            cursor:pointer;
            padding:0 1rem;
        }
        .header-nav__button--active{
            position: absolute;
            right:0.8rem;
            color:#FF5192;
            line-height:56px;
            font-size:2rem;
            cursor:pointer;
            padding:0 1rem;
        }
        .header-nav__item{
            color:#FF5192;
            z-index:2;
            text-align: right;
            padding-right: 10vh;
            font-size:1.5rem;
            line-height:5rem;
        }


        @keyframes fade-in {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

        @-moz-keyframes fade-in {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

        @-webkit-keyframes fade-in {
            0% {
                display: none;
                opacity: 0;
            }

            1% {
                display: block;
                opacity: 0;
            }

            100% {
                display: block;
                opacity: 1;
            }
        }

    }

</style>