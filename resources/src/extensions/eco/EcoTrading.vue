<template>
  <div>
    <div class="EcoContainer" style="margin: -18px -20px 3px -20px;">
      <template v-if="ext.eco == 1 && plat.eco.ecosystem_trading_only == 1">
        <EcoMarkets
          style="overflow-y: auto; overflow-x: hidden;"
          type="trade"
          subtype="non"
        />
      </template>
      <template v-else>
        <Markets
          style="overflow-y: auto; overflow-x: hidden;"
          type="trade"
          subtype="non"
        />
      </template>
      <Trades
        v-if="ecoStore.market.length != 0"
        :market="ecoStore.market"
        :precision-amount="ecoStore.precisionAmount"
        :precision-price="ecoStore.precisionPrice"
      />
      <div
        id="creatable"
        class="Chart border border-gray-100 bg-white shadow dark:border-gray-700 dark:bg-gray-900"
      >
        <Charting
          v-if="ecoStore.market.length != 0"
          :key="ecoStore.market.currency + ecoStore.market.pair"
          :market="ecoStore.market"
        />
      </div>
      <Order v-if="ecoStore.market.length != 0" :market="ecoStore.market" />
      <Orderbook v-if="ecoStore.market.length != 0" :market="ecoStore.market" />
    </div>
    <Orders
      v-if="ecoStore.market.length != 0"
      :market="ecoStore.market"
      :precision-amount="ecoStore.precisionAmount"
      :precision-price="ecoStore.precisionPrice"
    ></Orders>
  </div>
</template>

<script>
  import Markets from "@/main/trading/Markets.vue";
  import EcoMarkets from "./components/EcoMarkets.vue";
  import Trades from "./components/Trades.vue";
  import Charting from "./components/Charting.vue";
  import Order from "./components/Order.vue";
  import Orders from "./components/Orders.vue";
  import Orderbook from "./components/Orderbook.vue";
  import { onMounted } from "vue";
  import { useRouter } from "vue-router";
  import { useUserStore } from "@/store/user";

  import { useEcoStore } from "@/store/eco";
  export default {
    // component list
    components: {
      Markets,
      EcoMarkets,
      Trades,
      Charting,
      Order,
      Orders,
      Orderbook,
    },
    setup() {
      const ecoStore = useEcoStore();

      const userStore = useUserStore();
      const router = useRouter();
      async function checkKyc() {
        if (
          plat.kyc.kyc_status == 1 &&
          Number(plat.kyc.ecosystem_restriction) === 1
        ) {
          if (!userStore.user) {
            await userStore.fetch();
          }
          if (!userStore.user.kyc_application) {
            router.push("/identity");
          }
          if (
            userStore.user.kyc_application &&
            userStore.user.kyc_application.level < 2 &&
            userStore.user.kyc_application.status !== "approved"
          ) {
            router.push("/identity");
          }
        }
      }

      onMounted(() => {
        checkKyc();
      });
      return { ecoStore };
    },

    // component data
    data() {
      return {
        symbol: this.$route.params.symbol,
        currency: this.$route.params.currency,
        index: 0,
        plat: plat,
        ext: ext,
      };
    },
    watch: {
      async $route(to, from) {
        this.fetchData();
      },
    },

    created() {
      this.fetchData();
    },

    methods: {
      getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min)) + min;
      },
      async fetchData() {
        await this.ecoStore.fetch(
          this.$route.params.symbol,
          this.$route.params.currency
        );
      },
      isActive(menuItem) {
        return this.activeItem === menuItem;
      },
      setActive(menuItem) {
        this.activeItem = menuItem;
      },
    },
  };
</script>
<style lang="scss" scope>
  table {
    border-collapse: collapse;
    width: 100%;
    font-size: 12px;
    font-weight: 500;
    color: #b7bdc6;
    overflow: hidden;
  }
  @media only screen and (min-width: 1200px) {
    table {
      border-collapse: collapse;
      width: 100%;
      font-size: 13px;
      font-weight: 500;
      color: #b7bdc6;
      overflow: hidden;
    }
  }
  .tdd {
    position: relative;
    height: 18px;
    line-height: 18px;
  }
  td {
    .percent_ask {
      position: absolute;
      top: 0;
      height: 100%;
      bottom: 0;
      right: 0;
      background-color: rgba(246, 70, 94, 0.2);
    }
    .percent_bid {
      position: absolute;
      top: 0;
      bottom: 0;
      height: 100%;
      right: 0;
      background-color: rgba(14, 203, 129, 0.2);
    }
  }
  td.price {
    width: 30%;
    span {
      padding-left: 5px;
    }
  }
  td.quantity {
    width: 30%;
    text-align: right;
  }
  td.time {
    width: 40%;
    text-align: right;
    color: #999;
    padding-right: 5px;
  }
  td.btc {
    width: 40%;
    text-align: right;
    padding-right: 5px;
  }
</style>
