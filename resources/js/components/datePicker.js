const DatePicker = (/* model, */ format, min_date, max_date, time) => {
    const MONTH_NAMES = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    const MONTH_SHORT_NAMES = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
    ];

    const DAYS = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    return {
        /* model, */
        i: '',
        showDatepicker: false,
        datepickerValue: "",
        selectedDate: "",
        selectedDateNoFormat: "",
        dateFormat: format,
        month: "",
        year: "",
        actual_year: "",
        no_of_days: [],
        blankdays: [],
        min_date: min_date,
        max_date: max_date,
        MONTH_NAMES: MONTH_NAMES,
        MONTH_SHORT_NAMES: MONTH_SHORT_NAMES,
        DAYS: DAYS,
        time: time,
        hour: '01',
        minutes: '00',
        indicator: 'AM',

        init() {
            this.initDate();
            this.getNoOfDays();

            if (this.min_date) {
                this.min_date = new Date(Date.parse(this.min_date));
            }

            if (this.max_date) {
                this.max_date = new Date(Date.parse(this.max_date));
            }
        },

        initDate() {
            let today;

            if (this.selectedDate) {
                today = new Date(Date.parse(this.selectedDate));
            } else {
                today = new Date();
            }

            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.actual_year = today.getFullYear();
            this.selectedDateNoFormat = today;
            this.datepickerValue = this.formatDateForDisplay(today);
        },

        formatDateForDisplay(date) {
            let formattedDay = DAYS[date.getDay()];
            let formattedDate = ("0" + date.getDate()).slice(-2);

            let formattedMonth = MONTH_NAMES[date.getMonth()];

            let formattedMonthShortName = MONTH_SHORT_NAMES[date.getMonth()];

            let formattedMonthInNumber = ("0" + (parseInt(date.getMonth()) + 1)).slice(-2);

            let formattedYear = date.getFullYear();

            var timeFormat = '';
            if(this.time){
                timeFormat = ' ' + this.hour + ':' + this.minutes + ' ' + this.indicator;
            }

            if (this.dateFormat === "MM/DD/YYYY") {
                return `${formattedMonthInNumber}/${formattedDate}/${formattedYear}` + timeFormat;
            }

            if (this.dateFormat === "YYYY-MM-DD") {
                return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}` + timeFormat;
            }

            if (this.dateFormat === "D d M, Y") {
                return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}` + timeFormat;
            }

            return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}` + timeFormat;
        },

        isSelectedDate(date) {
            const d = new Date(this.year, this.month, date);

            return this.datepickerValue === this.formatDateForDisplay(d);
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);

            return today.toDateString() === d.toDateString();
        },

        checkDates(date, date2) {
            if (!date || !date2) {
                return false;
            }

            if (date >= date2) {
                return true;
            } else {
                return false;
            }
        },

        isValidDate(date) {
            date = new Date(this.year, this.month, date);

            var valid = true;

            if (this.min_date) {
                valid = this.checkDates(date, this.min_date);
            }

            if (this.max_date) {
                valid = valid && this.checkDates(this.max_date, date);
            }

            return valid;
        },

        getDateValue(date) {
            let selectedDate = new Date(this.year, this.month, date);

            if (this.min_date) {
                if (!this.checkDates(selectedDate, this.min_date)) {
                    return;
                }
            }

            if (this.max_date) {
                if (!this.checkDates(this.max_date, selectedDate)) {
                    return;
                }
            }

            this.selectedDateNoFormat = selectedDate;
            this.datepickerValue = this.formatDateForDisplay(selectedDate);

            this.model = this.datepickerValue;

            this.isSelectedDate(date);

            this.showDatepicker = false;
        },

        setTime(){
            this.datepickerValue = this.formatDateForDisplay(this.selectedDateNoFormat);
            this.model = this.datepickerValue;
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();

            let dayOfWeek = new Date(this.year, this.month).getDay();

            let blankdaysArray = [];

            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }

            let daysArray = [];

            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }

            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        },
    }
}

export default DatePicker;
