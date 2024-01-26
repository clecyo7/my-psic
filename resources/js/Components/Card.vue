<template>
    <div class="rounded relative" :class="[bgColor].join(' ')">
        <i class=" mr-2 absolute mt-7 top-6 left-5 invisible xl:visible text-4xl" :class="[colorText, icon]"></i>
        <div class="text-center p-4 text-sm font-bold" :class="colorText">
            {{ title }}
        </div>
        <div class="overflow-hidden grid grid-cols-1 md:col-span-2 gap-4">
            <div class="pt-1 pb-3 xl:object-none xl:object-center" :class="colorText">
                <div class="text-center">
                    <p class="text-2xl font-bold">
                        {{ count }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        title: String,
        color: String,
        icon: String,
        count: {
            type: Number,
            default: 0
        }
    },

    computed: {
        bgColor() {
            return `bg-${this.color}-100`
        },
        colorText() {
            return `text-${this.color}-500`
        },
    }
}

</script>