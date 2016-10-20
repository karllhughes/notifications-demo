# Laravel 5.3 Notifications Demo

Created by [Karl Hughes](https://github.com/karllhughes) for the [Laravel Chicago meetup group](http://www.meetup.com/laravel-chicago/) on October 25, 2016.

## About this project
This repository contains several branches - one for each feature of the Laravel Notifications system that I wanted to demo. You can follow along using the [original presentation on Google Drive](https://docs.google.com/presentation/d/109VHOOHBmyRD-7xb1vgfYrHgNCvi23i3ct91MFzrops/edit?usp=sharing) or just check out the diffs between branches.

### Branches
- [mail](https://github.com/karllhughes/notifications-demo/tree/mail) - Demo of the [Laravel Mail feature](https://laravel.com/docs/5.3/mail).
- [notifications](https://github.com/karllhughes/notifications-demo/tree/notifications) - Demo of the [Laravel Notifications feature](https://laravel.com/docs/5.3/notifications).
- [calling](https://github.com/karllhughes/notifications-demo/tree/calling) - Comparison of the Notification trait vs. Facade.
- [via](https://github.com/karllhughes/notifications-demo/tree/via) - Showing the use of multiple notification channels.
- [queueing](https://github.com/karllhughes/notifications-demo/tree/queueing) - Making a notification queueable.
- [delaying](https://github.com/karllhughes/notifications-demo/tree/delaying) - Delaying delivery of a notification.
- [testing](https://github.com/karllhughes/notifications-demo/tree/testing) - Example of unit testing a notification flow.
- [email-notifications](https://github.com/karllhughes/notifications-demo/tree/email-notifications) - Detailed example of email notifications, composing custom views, custom email message objects.

### Covered elsewhere
- [db-notifications](https://github.com/jobapis/jobs-to-mail/blob/master/app/Notifications/JobsCollected.php) - Creating database entries for each notification sent using JobsToMail as an example.

### Not covered
I didn't have time to show everything that you can do with Laravel notifications, so refer to the docs to learn more about:

- Broadcasting notifications to a frontend.
- Notification events.
- SMS, Slack notifications.
- Custom notification channels.

### Further reading
- [Official Laravel Notifications documentation](https://mattstauffer.co/blog/the-new-notification-system-in-laravel-5-3)
- [Matt Stauffer's tutorial](https://mattstauffer.co/blog/the-new-notification-system-in-laravel-5-3)
