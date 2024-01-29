import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';

// Register plugins
Calendar.registerPlugin(dayGridPlugin);
Calendar.registerPlugin(timeGridPlugin);
Calendar.registerPlugin(listPlugin);

// Export FullCalendar object
window.FullCalendar = Calendar;
