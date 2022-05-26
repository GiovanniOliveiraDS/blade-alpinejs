@props([
    'format' => 'MM/DD/YYYY',
    'min_date' => '',
    'max_date' => '',
    'label' => '',
    'time' => false,
])

<div>
    <div x-data="datePicker({{-- @entangle($attributes->wire('model')), --}} @js($format), @js($min_date), @js($max_date), @js($time))" x-cloak>
        <div {{ $attributes->merge(['class' => 'relative']) }}>
            <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
            <x-input
                type="text"
                x-on:click="showDatepicker = true"
                x-model="datepickerValue"
                x-on:keydown.escape="showDatepicker = false"
                class="w-full"
                :label="$label"
                placeholder="Select date"
            />

            <div class="hidden">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>

            <div
                class="bg-white mt-3 p-5 rounded-xl shadow-md relative"
                x-show="showDatepicker"
                x-transition:enter="transition ease-out"
                x-transition:enter-start="opacity-0 -translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-6"
                x-on:click.away="showDatepicker = false"
            >
                <div class="flex justify-center items-center mb-8 relative">
                    <div class="z-10">
                        <select
                            id="months"
                            class="border-0 bg-gray-50 rounded outline-none"
                            x-on:change="getNoOfDays()"
                            x-model="month"
                        >
                            <template x-for="(_month, idx) in MONTH_NAMES">
                                <option x-bind:value="idx" :selected="idx === month" x-text="_month">
                                </option>
                            </template>
                        </select>

                        <select
                            id="years"
                            class="border-0 bg-gray-50 rounded outline-none"
                            x-on:change="getNoOfDays()"
                            x-model="year"
                        >
                            <template x-for="_year in (actual_year + 100)">
                                <option x-show="_year >= actual_year - 100" x-bind:value="_year"
                                    :selected="year === _year" x-text="_year"></option>
                            </template>
                        </select>
                    </div>
                    <div class="absolute top-3 left-0 flex w-full justify-between z-0">
                        <button type="button" class="date-picker-btn" x-on:click="
                            if (month == 0) {
                                year--;month = 12;
                            } month--;
                            getNoOfDays()"
                        >
                            <x-icons.heroicons.outline.chevron-left class="w-5 h-5" />
                        </button>
                        <button type="button" class="date-picker-btn" x-on:click="
                            if (month == 11) {
                                month = 0;
                                year++;
                            } else {
                                month++;
                            } getNoOfDays()"
                        >
                            <x-icons.heroicons.outline.chevron-right class="w-5 h-5" />
                        </button>
                    </div>
                </div>

                <div class="flex mb-3">
                    <template x-for="(day, index) in DAYS" :key="index">
                        <div class="w-full px-1">
                            <div class="text-sm text-center text-gray-600" x-text="day"></div>
                        </div>
                    </template>
                </div>

                <div class="grid grid-cols-7">
                    <template x-for="blankday in blankdays">
                        <div class="w-10 h-10 flex justify-center items-center mx-auto">
                        </div>
                    </template>

                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                        <div class="w-full text-center text-sm">
                            <div class="w-10 h-10 flex justify-center items-center mx-auto rounded-full cursor-pointer hover:text-blue-900 hover:bg-blue-100"
                                x-on:click="getDateValue(date)" x-text="date"
                                :class="{
                                    'text-blue-800': isToday(date) == true,
                                    'text-gray-700': isToday(date) == false && isSelectedDate(date) == false,
                                    'bg-blue-900 text-blue-100': isSelectedDate(date) == true,
                                    'text-gray-50': isValidDate(date) == false,
                                }">
                            </div>
                        </div>
                    </template>
                </div>

                @if ($time)
                    <div class="flex items-center w-full gap-2 mt-5">
                        <select
                            id="hours"
                            class="w-full border-0 bg-gray-50 rounded outline-none"
                            x-on:change="setTime()"
                            x-model="hour"
                        >
                            <template x-for="i in 12">
                                <option
                                    x-bind:value="i.toString().length == 1 ? '0' + i.toString() : i.toString()"
                                    :selected="(i.toString().length == 1 ? '0' + i.toString() : i.toString()) === hour"
                                    x-text="i.toString().length == 1 ? '0' + i.toString() : i.toString()">
                                </option>
                            </template>
                        </select>

                        <span>:</span>

                        <select
                            id="hours"
                            class="w-full border-0 bg-gray-50 rounded outline-none"
                            x-on:change="setTime()"
                            x-model="minutes"
                        >
                            <option x-bind:value="'00'" :selected="'00' === minutes" x-text="'00'">
                            </option>
                            <template x-for="i in 59">
                                <option
                                    x-bind:value="i.toString().length == 1 ? '0' + i.toString() : i.toString()"
                                    :selected="(i.toString().length == 1 ? '0' + i.toString() : i.toString()) === minutes"
                                    x-text="i.toString().length == 1 ? '0' + i.toString() : i.toString()">
                                </option>
                            </template>
                        </select>

                        <select
                            id="hours"
                            class="w-full border-0 bg-gray-50 rounded outline-none"
                            x-on:change="setTime()"
                            x-model="indicator"
                        >
                            <option x-bind:value="'AM'" :selected="'AM' === indicator">AM</option>
                            <option x-bind:value="'PM'" :selected="'PM' === indicator">PM</option>
                        </select>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
