#[No Bots](https://github.com/SU-SWS/nobots)
##### Version: 7.x-1.0-dev

Maintainers: [jbickar](https://github.com/jbickar), [sherakama](https://github.com/sherakama)
[Changelog.txt](CHANGELOG.txt)


This module blocks (well-behaved) search engine robots from
crawling, indexing, or archiving your site by setting a
"X-Robots-Tag: noindex,nofollow,noarchive" HTTP header.

Enable the module to block search engine robots.
Disable the module to let them crawl your site.

Installation
---

Install this module like any other module. [See Drupal Documentation](https://drupal.org/documentation/install/modules-themes/modules-7)

Configuration
---

Enable the module to block search engine robots.
Disable the module to let them crawl your site.

Advanced Configuration
---
You can set the `nobots` variable to **FALSE** to leave the module enabled, yet still allow robots to crawl your site.

An example use-case would be to set `$conf['nobots'] = FALSE;` in settings.php for the production environment, and `TRUE` for all other environments.

Troubleshooting
---

If you are experiencing issues with this module try reverting the feature first. If you are still experiencing issues try posting an issue on the GitHub issues page.

Contribution / Collaboration
---

You are welcome to contribute functionality, bug fixes, or documentation to this module. If you would like to suggest a fix or new functionality you may add a new issue to the GitHub issue queue or you may fork this repository and submit a pull request. For more help please see [GitHub's article on fork, branch, and pull requests](https://help.github.com/articles/using-pull-requests)
