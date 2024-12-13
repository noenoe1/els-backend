<template>
    <div class="wrap">
        <div class="left">
            <DayPilotNavigator :config="navigatorConfig" />
        </div>
        <div class="content">
            <DayPilotCalendar :config="calendarConfig" ref="calendarRef" />
        </div>
    </div>
</template>

<script setup>
import { DayPilot, DayPilotCalendar, DayPilotNavigator } from '@daypilot/daypilot-lite-vue';
import { ref, reactive, onMounted } from 'vue';

const navigatorConfig = reactive({
    selectMode: "Week",
    showMonths: 3,
    skipMonths: 3,
    startDate: "2024-11-01",//Y-M-d
    selectionDay: "2025-01-30",
    onTimeRangeSelected: args => {
        calendarConfig.startDate = args.day;
    }
});

const calendarConfig = reactive({
    viewType: "Week",
    startDate: "2024-11-09",
    durationBarVisible: false,
    timeRangeSelectedHandling: "Enabled",
    onTimeRangeSelected: async (args) => {
        const form = [
            { name: "Request an Appointment" },
            { name: "From", id: "start", dateFormat: "MMMM d, yyyy h:mm tt", disabled: true },
            { name: "To", id: "end", dateFormat: "MMMM d, yyyy h:mm tt", disabled: true },
            { name: "Name", id: "name" },
        ];

        const data = {
            id: args.id,
            start: args.start,
            end: args.end,
        };

        const options = {
            focus: "name"
        };
        const modal = await DayPilot.Modal.form(form, data, options);
        const dp = args.control;
        dp.clearSelection();
        if (modal.canceled) {
            return;
        }
        dp.events.add({
            start: args.start,
            end: args.end,
            id: DayPilot.guid(),
            text: modal.result
        });
    },
    contextMenu: new DayPilot.Menu({
        items: [
            {
                text: "Delete", onClick: args => {
                    const dp = calendarRef.value.control;
                    dp.events.remove(args.source);
                }
            }
        ]
    }),
    onBeforeEventRender: args => {
        if (args.data.tags && args.data.tags.type === "important") {
            args.data.rightClickDisabled = true;
            args.data.backColor = "#ef4444";
            args.data.borderColor = "#ef4444";
        }
        args.data.areas = [
            {
                right: 5,
                top: 7,
                width: 25,
                height: 25,
                backColor: "#ffffff",
                fontColor: "#666666",
                padding: 4,
                style: "border-radius: 50%;",
                action: "ContextMenu",
            }
        ];
    },
    eventDeleteHandling: "Disabled",
    onEventMoved: () => {
        console.log("Event moved");
    },
    onEventResized: () => {
        console.log("Event resized");
    },
});

const calendarRef = ref(null);

const loadEvents = () => {
    const events = [
        {
            id: 1,
            start: "2024-11-09T10:00:00",
            end: "2024-11-09T11:00:00",
            text: "Event 1",
            backColor: "#6aa84f",
            borderColor: "#569838",
        },
        {
            id: 2,
            start: "2025-02-24T13:00:00",
            end: "2025-02-24T16:00:00",
            text: "Event 2",
            backColor: "#f1c232",
            borderColor: "#d5a715",
        },
        {
            id: 3,
            start: "2025-02-25T13:30:00",
            end: "2025-02-25T16:30:00",
            text: "Event 3",
            backColor: "#da5c41",
            borderColor: "#cc4125",
        },
        {
            id: 4,
            start: "2024-11-11T10:30:00",
            end: "2024-11-11T12:30:00",
            text: "Event 4",
            tags: { type: "important" }
        },
    ];
    calendarConfig.events = events;
};

onMounted(() => {
    loadEvents();
});
</script>

<style>
.wrap {
    display: flex;
}

.left {
    margin-right: 10px;
}

.content {
    flex-grow: 1;
}


.calendar_default_event_inner {
    background: #2e78d6;
    border-color: #0a5cd2;
    color: white;
    border-radius: 5px;
    opacity: 0.9;
}
</style>