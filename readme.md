# Laravel 5.3 Notifications Demo

Created by [Karl Hughes](https://github.com/karllhughes) for the [Laravel Chicago meetup group](http://www.meetup.com/laravel-chicago/) on October 25, 2016.

## About this project
This repository contains several branches - one for each feature of the Laravel Notifications system that I wanted to demo. You can follow along using the [original presentation on Google Drive](https://docs.google.com/presentation/d/109VHOOHBmyRD-7xb1vgfYrHgNCvi23i3ct91MFzrops/edit?usp=sharing) or just check out the diffs between branches.

### Branches
- [mail](https://github.com/karllhughes/notifications-demo/tree/mail) - Demo of the [Laravel Mail feature](https://laravel.com/docs/5.3/mail).
- [notifications](https://github.com/karllhughes/notifications-demo/tree/notifications) - Demo of the [Laravel Notifications feature](https://laravel.com/docs/5.3/notifications).
- [calling](https://github.com/karllhughes/notifications-demo/tree/calling) - Comparison of the Notification trait vs. Facade.
- [queueing](https://github.com/karllhughes/notifications-demo/tree/queueing) - Making a notification queueable.
- [testing](https://github.com/karllhughes/notifications-demo/tree/testing) - Example of unit testing a notification flow.
- [delaying](https://github.com/karllhughes/notifications-demo/tree/delaying) - Delaying delivery of a notification.
- [email-notifications](https://github.com/karllhughes/notifications-demo/tree/email-notifications) - Detailed example of email notifications.
- [db-notifications](https://github.com/karllhughes/notifications-demo/tree/db-notifications) - Detailed example of saving/updating/deleting notifications from a database.
- [events](https://github.com/karllhughes/notifications-demo/tree/events) - Using an event listener to track notifications.
- [custom-channel](https://github.com/karllhughes/notifications-demo/tree/custom-channel) - Demonstrating a custom notification channel.

### Not covered
I didn't have time to show everything that you can do with Laravel notifications, so refer to the docs to learn more about:

- Broadcasting notifications to a frontend.
- SMS notifications.
- Slack notifications.
