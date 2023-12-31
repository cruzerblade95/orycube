<template>
    <div
        class="watchform-overlay sticky-top"
        :class="{ visible: visible, overflow: overflow, under: under }"
        @click.stop="close"
    >
        <section
            class="watchform-wrap"
            :class="{ collapsed: header.collapsed }"
            @click.stop
        >
            <!-- close button -->
            <button
                class="watchform-close text-primary-hover"
                @click.stop="close"
            >
                <span class="bi bi-x-lg iconLeft">Close</span>
            </button>

            <!-- inner container -->
            <div ref="watchform" class="watchform-container">
                <div class="container mx-2">
                    <div class="flex-middle flex-stretch flex-row">
                        <div class="text-info mr-1 flex-1">
                            <span class="text-bright bi bi-gear iconLeft"
                                >Presets:</span
                            >
                            <button
                                v-for="p in presetsList"
                                :key="p.name"
                                class="ml-1 btn btn-light btn-sm"
                                :class="{ 'text-gain': p.active }"
                                @click.prevent="applyPreset(p.name)"
                            >
                                {{ p.name }}
                            </button>
                        </div>
                        <div class="text-clip">
                            <span class="bi bi-eye iconLeft text-primary">{{
                                countInfo
                            }}</span>
                        </div>
                    </div>

                    <hr />

                    <!-- form inputs -->
                    <div class="flex-grid flex-grid-md flex-middle">
                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.market"
                                class="flex-1"
                                :options="marketOptions"
                                @change="formChange"
                            ></SelectMenu>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.priceType"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="change">Price change</option>
                                <option value="gain">Price gain</option>
                                <option value="loss">Price loss</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.priceChange"
                                class="mr-1 flex-1"
                                type="range"
                                min="0.0"
                                max="100.0"
                                step="0.5"
                                @change="formChange"
                            />
                            <div class="text-secondary">
                                <toFixed
                                    :num="watchOptions.priceChange"
                                    :asset="1"
                                />%
                            </div>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.volumeType"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="change">Volume change</option>
                                <option value="gain">Volume gain</option>
                                <option value="loss">Volume loss</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.volumeChange"
                                class="mr-1 flex-1"
                                type="range"
                                min="0.0"
                                max="100.0"
                                step="0.5"
                                @change="formChange"
                            />
                            <div class="text-secondary">
                                <toFixed
                                    :num="watchOptions.volumeChange"
                                    :asset="1"
                                />%
                            </div>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.priceCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="above">Price above</option>
                                <option value="below">Price below</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.price"
                                class="mr-1 text-light flex-1"
                                type="text"
                                placeholder="0.00000000"
                                @keyup="numInput"
                                @change="formChange"
                            />
                            <div class="text-secondary">
                                {{ watchOptions.market }}
                            </div>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.volumeCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="above">Volume above</option>
                                <option value="below">Volume below</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.volume"
                                class="text-light"
                                type="text"
                                placeholder="0000"
                                @keyup="numInput"
                                @change="formChange"
                            />
                            <div class="text-secondary mr-1">
                                {{ watchOptions.market }}
                            </div>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.timeCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="less">Within last</option>
                                <option value="more">Wait past</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.timeLimit"
                                class="mr-1 flex-1"
                                type="range"
                                min="0"
                                max="60"
                                step="1"
                                @change="formChange"
                            />
                            <div class="text-secondary">
                                <toNoun
                                    :num="watchOptions.timeLimit"
                                    :s="min"
                                    :p="mins"
                                />
                            </div>
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.changeCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="above">24h % above</option>
                                <option value="below">24h % below</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.change"
                                class="mr-1 flex-1"
                                type="range"
                                min="0.0"
                                max="100.0"
                                step="0.5"
                                @change="formChange"
                            />
                            <span class="text-secondary"
                                ><toFixed
                                    :num="watchOptions.change"
                                    :asset="1"
                                />%</span
                            >
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.volatilityCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="above">Volatility above</option>
                                <option value="below">Volatility below</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.volatility"
                                class="mr-1 flex-1"
                                type="range"
                                min="0.0"
                                max="100.0"
                                step="0.5"
                                @change="formChange"
                            />
                            <span class="text-secondary"
                                ><toFixed
                                    :num="watchOptions.volatility"
                                    :asset="1"
                                />%</span
                            >
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.dangerCheck"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="above">Danger above</option>
                                <option value="below">Danger below</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.danger"
                                class="mr-1 flex-1"
                                type="range"
                                min="0.0"
                                max="100.0"
                                step="0.5"
                                @change="formChange"
                            />
                            <span class="text-secondary"
                                ><toFixed
                                    :num="watchOptions.danger"
                                    :asset="1"
                                />%</span
                            >
                        </div>

                        <div class="text-nowrap form-input">
                            <SelectMenu
                                v-model="watchOptions.filterType"
                                class="mr-1"
                                @change="formChange"
                            >
                                <option value="allow">Only tokens</option>
                                <option value="deny">Skip tokens</option>
                            </SelectMenu>
                            <input
                                v-model="watchOptions.filterText"
                                class="mr-1 text-light flex-1"
                                type="text"
                                placeholder="TOKEN1 TOKEN2 ..."
                                @change="formChange"
                            />
                        </div>

                        <div>
                            <button
                                type="button"
                                class="btn iconLeft"
                                :class="{
                                    'btn-danger bi bi-stop-circle': active,
                                    'btn-success bi bi-caret-right-fill':
                                        !active,
                                }"
                                :disabled="!tickerStatus"
                                @click.prevent="toggleWatch"
                            >
                                {{
                                    active
                                        ? "Watching " + elapsed + " ..."
                                        : "Start watching ..."
                                }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import watchPresets from "../../configs/watchPresets";
import Watcher from "../../modules/watcher";
import SelectMenu from "./SelectMenu.vue";
import toFixed from "../../partials/toFixed.vue";
import toNoun from "../../partials/toNoun.vue";

// component
export default {
    // sub components
    components: { SelectMenu, toFixed, toNoun },

    // component props
    props: {
        header: {
            type: Object,
            default() {
                return {};
            },
        },
        options: {
            type: Object,
            default() {
                return {};
            },
            required: true,
        },
        tickerStatus: { type: Number, default: 0, required: true },
        priceData: {
            type: Array,
            default() {
                return [];
            },
            required: true,
        },
        assetsList: {
            type: Array,
            default() {
                return [];
            },
            required: true,
        },
        marketsData: {
            type: Object,
            default() {
                return {};
            },
            required: true,
        },
    },

    // comonent data
    data() {
        return {
            // display
            visible: false,
            overflow: false,
            under: true,
            sto: null,
            // price watch
            watcher: new Watcher(),
            countInfo: "...",
            active: false,
            start: 0,
            elapsed: "0s",
            // watchform options
            watchPreset: "", // selected name
            watchPresets: watchPresets,
            watchOptions: {
                market: "BTC", // market pair
                priceType: "change", // change, gain, loss
                priceChange: "2", // change percent
                priceCheck: "below", // above, below
                price: "", // custom price limit
                volumeType: "gain", // change, gain, loss
                volumeChange: "1", // change percent
                volumeCheck: "above", // above, below
                volume: "", // custom volume limit
                changeCheck: "above", // above, below
                change: "0", // custom 24h percent change
                volatilityCheck: "below", // above, below
                volatility: "0", // custom volatility limit
                dangerCheck: "below", // above, below
                danger: "0", // custom danger limit
                timeCheck: "less", // more, less
                timeLimit: "10", // limit change by time (mins)
                filterType: "deny", // deny, allow
                filterText: "", // csv tokens str
            },
        };
    },

    // computed methods
    computed: {
        // build markets select options
        marketOptions() {
            let options = [];
            for (let key in this.marketsData) {
                if (!this.marketsData.hasOwnProperty(key)) continue;
                let { token, count } = this.marketsData[key];
                options.push({
                    value: token,
                    text: `${token} Pairs (${count})`,
                });
            }
            return options;
        },

        // get presets list
        presetsList() {
            return this.watchPresets.map((p) => {
                p.active = this.watchPreset === p.name ? true : false;
                return p;
            });
        },
    },

    // watch methods
    watch: {
        // check prices when list updates, if enabled
        priceData() {
            this.updateWatchCount();
            this.checkPrices();
        },
    },

    // on component created
    created() {
        this.$bus.on("toggleWatchform", this.toggleWatchform);
        window.addEventListener("resize", this.close);
    },

    // on component mounted
    mounted() {
        this.buildSnapshot();
    },

    // on component destroyed
    unmounted() {
        window.removeEventListener("resize", this.close);
    },

    // custom methods
    methods: {
        // toggle open/close
        toggle(e) {
            if (this.visible) {
                this.close(e);
            } else {
                this.open(e);
            }
        },

        // open from container
        open(e) {
            if (!this.$refs.watchform || this.visible) return;
            // start open animation
            this.visible = true;
            this.overflow = false;
            this.under = false;
            const box = this.$refs.watchform.firstChild.getBoundingClientRect();
            this.$refs.watchform.style.maxHeight = box.height + "px";
            // allow overflowing once it's open
            if (this.sto) clearTimeout(this.sto);
            this.sto = setTimeout(() => {
                this.overflow = true;
            }, 400);
        },

        // close from container
        close(e) {
            if (!this.$refs.watchform || !this.visible) return;
            // start closing animation
            this.visible = false;
            this.overflow = false;
            this.$refs.watchform.style.maxHeight = "0px";
            // send to back once hidden
            if (this.sto) clearTimeout(this.sto);
            this.sto = setTimeout(() => {
                this.under = true;
            }, 400);
        },

        // only allow numbers for some form inputs
        numInput(e) {
            this.watchOptions.price = String(this.watchOptions.price).replace(
                /[^\d\.\-]+/g,
                ""
            );
            this.watchOptions.volume = String(this.watchOptions.volume).replace(
                /[^\d\.\-]+/g,
                ""
            );
        },

        // add a preset
        addPreset(name, options) {
            if (
                !name ||
                this.watchPresets.filter((p) => p.name === name).length
            )
                return;
            options = Object.assign({}, this.watchOptions, options);
            this.watchPresets.push({ name, options });
        },

        // remove preset
        removePreset(name) {
            if (!name) return;
            this.watchPresets = this.watchPresets.filter(
                (p) => p.name !== name
            );
        },

        // apply a preset
        applyPreset(name) {
            let preset = name
                ? this.watchPresets.filter((p) => p.name === name).shift()
                : null;
            if (preset) {
                this.watchPreset = preset.name;
                this.watchOptions = Object.assign(
                    this.watchOptions,
                    preset.options
                );
                this.buildSnapshot();
                this.$notify.flush();
            }
        },

        // reset some things when the form is changed while runnig
        formChange(e) {
            this.watchPreset = "";
            this.buildSnapshot();
            this.$notify.flush();
        },

        // start price watch
        startWatch() {
            if (this.active || this.tickerStatus !== 2) return;
            this.active = true;
            this.elapsed = "0s";
            this.buildSnapshot();
            this.$bus.emit("priceWatch", this.active);
            this.$bus.emit(
                "showNotice",
                "Price watch is now active.",
                "success"
            );
        },

        // stop price watch
        stopWatch() {
            if (!this.active) return;
            this.active = false;
            this.$notify.flush();
            this.$bus.emit("priceWatch", this.active);
            this.$bus.emit("showNotice", "Price watch has stopped.", "warning");
        },

        // toggle price watch
        toggleWatch(e) {
            e && e.preventDefault();
            if (this.active) {
                this.stopWatch();
            } else {
                this.startWatch();
            }
        },

        // control watchform component
        toggleWatchform(action) {
            switch (action) {
                case "open":
                    return this.open();
                case "close":
                    return this.close();
                case "toggle":
                    return this.toggle();
                case "start":
                    return this.startWatch();
                case "stop":
                    return this.stopWatch();
            }
        },

        // make a copy of current prices to start comparing against
        buildSnapshot() {
            this.start = Date.now();
            this.watcher.setOptions(this.watchOptions);
            this.watcher.updateSnapshot(this.priceData);
        },

        // count total pairs for select option
        updateWatchCount() {
            if (!this.visible) return;
            let market = String(this.watchOptions.market || "");
            let count = this.watcher.watchCount(this.priceData);
            this.countInfo = this.$utils.noun(
                count,
                market + " pair",
                market + " pairs"
            );
            this.elapsed =
                this.$utils.elapsed((Date.now() - this.start) / 1000) || "0s";
        },

        // check current prices against snapshot based on options
        checkPrices() {
            if (!this.active) return;
            this.watcher.check(this.priceData, (p, pc, vc, t) => {
                let pricePerc = pc.sign + Number(pc.percent).toFixed(2) + "%";
                let volPerc = vc.sign + Number(vc.percent).toFixed(2) + "%";
                let curPrice =
                    "Price " +
                    pc.arrow +
                    " " +
                    pricePerc +
                    " (" +
                    Number(p.close).toFixed(8) +
                    " " +
                    p.market +
                    ")";
                let curVol =
                    "Volume " +
                    vc.arrow +
                    " " +
                    volPerc +
                    " (" +
                    this.$utils.money(p.assetVolume, 0) +
                    " " +
                    p.market +
                    ")";
                let curVolat =
                    "Volatility ● " + Number(p.volatility).toFixed(1) + "% 24h";
                let elapsed = "Last ● " + this.$utils.elapsed(t);
                let title = [
                    p.name,
                    "(" + p.pair + ")",
                    p.sign + Number(p.percent).toFixed(2) + "%",
                ].join(" ");
                let info = [curPrice, curVol, curVolat, elapsed].join("\n");
                let icon = this.$utils.fullUrl(p.image);
                this.$messenger.add(title, info, icon);
                this.$history.add(title, info, icon);
            });
        },
    },
};
</script>

<style lang="scss">
@import "../../scss/variables";
// watchform
.watchform-overlay {
    display: block;
    position: fixed;
    overflow: hidden;
    top: calc(#{$topbarH} + #{$topbarHeight});
    width: 100%;
    height: 100%;
    background-color: rgba($colorOverlay, 0);
    z-index: calc($zindexElements + 5);

    // main wrapper
    .watchform-wrap {
        display: block;
        position: relative;
        background-color: darken($colorDocumentLight, 2%);

        // collapsed mode
        &.collapsed {
            //transform: translateY( -#{$topbarHeight} );
            //top: -#{$topbarHeight};
            position: sticky;
        }

        // close button
        .watchform-close {
            display: block;
            position: absolute;
            width: auto;
            left: 50%;
            top: 100%;
            padding: 0 2em 0.6em 2em;
            text-align: center;
            background-color: darken($colorDocumentLight, 2%);
            border-radius: 0 0 100px 100px;
            transform: translateX(-50%);
            box-shadow: 0 8px 4px rgba(0, 0, 0, 0.2);
            opacity: 0;
        }

        // main form container
        .watchform-container {
            display: block;
            overflow: hidden;
            transition: max-height $fxSpeed $fxEase;
            max-height: 0;

            .container {
                padding-top: 1em;
                padding-bottom: 2em;
            }
        }
    }

    // visible state
    &.visible {
        pointer-events: auto;
        background-color: $colorOverlay;
        .watchform-wrap {
            box-shadow: $shadowPaper;
        }
        .watchform-close {
            opacity: 1;
        }
    }

    // allow overflow
    &.overflow {
        .watchform-container {
            overflow: visible;
        }
    }

    // hidden state
    &.under {
        pointer-events: none;
        z-index: $zindexUnder;
    }
}
</style>
