<div>
    <div class="relative w-full bg-gray-300 h-[.5rem] rounded-full overflow-hidden ">
        <div class="absolute top-0 left-0 h-full bg-blue-500/90 rounded-full" style="width: {{ ($raised / $goal)*100}}%"></div>
    </div>
    <div class="flex gap-4 justify-between">
        <div class="flex flex-col gap-2 w-full mt-2">
            <div class="text-lg"><span class="font-bold text-xl mx-2">&pound {{ $raised }}</span> Raised</div>
            <div class="text-lg"><span class="font-bold text-xl mx-2">&pound {{ $goal }}</span>Goal</div>
        </div>
        <div class="w-32 text-right ">
            <div class="text-red-700 font-bold text-3xl"> {{ number_format(( $raised / $goal) * 100,0) }}%</div>
            <div class=""> pledge so far</div>
        </div>
    </div>
</div>