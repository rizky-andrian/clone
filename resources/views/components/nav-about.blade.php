<style>
    /* Add transition effect for arrow rotation */
</style>

<div class="flex justify-center grid grid-cols-1 md:grid-cols-3 gap-2">
    <!-- History -->
    <div id="history" onclick="toggleContent('history')"
        class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center hover:bg-white hover:text-caa-primary text-white bg-caa-primary">
        <div class="px-1 md:px-8 text-xs md:text-xl flex items-center justify-between">
            <p><i class="fas fa-history"></i> Our History</p>
            <i class="fas fa-arrow-up  arrow-transition" id="history-arrow"></i> <!-- Arrow down initially -->
        </div>
    </div>

    <!-- Vision & Mission -->
    <div id="vision-mission" onclick="toggleContent('vision-mission')"
        class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center hover:bg-white hover:text-caa-primary text-white bg-caa-primary">
        <div class="px-1 md:px-8 text-xs md:text-xl flex items-center justify-between">
            <p><i class="fas fa-chevron-up"></i> Our Vision & Mission</p>
            <i class="fas fa-arrow-up  arrow-transition" id="vision-mission-arrow"></i> <!-- Arrow down initially -->
        </div>
    </div>

    <!-- Who We Are -->
    <div id="who-we-are" onclick="toggleContent('who-we-are')"
        class="h-10 md:h-16 drop-shadow-lg rounded-lg flex flex-col justify-center hover:bg-white hover:text-caa-primary text-white bg-caa-primary">
        <div class="px-1 md:px-8 text-xs md:text-xl flex items-center justify-between">
            <p><i class="fas fa-user-tie"></i> Who We Are</p>
            <i class="fas fa-arrow-up  arrow-transition" id="who-we-are-arrow"></i> <!-- Arrow down initially -->
        </div>
    </div>
</div>


<script></script>
