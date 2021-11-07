import dayjs from "dayjs";

export const format = (date, template = 'YYYY年MM月DD日') => {
    const day = dayjs(date);
    return day.isValid() ? day.format(template) : date;
}
