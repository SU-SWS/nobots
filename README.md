# [No Bots](https://github.com/SU-SWS/nobots)
##### Version: 8.x

Maintainers: [jbickar](https://github.com/jbickar), [sherakama](https://github.com/sherakama), [pookmish](https://github.com/pookmish)
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

An example use-case would be to set `$settings['nobots'] = FALSE;` in settings.php for the production environment, and `TRUE` for all other environments.

You can also set the state `nobots` to **FALSE**. `drush state:set nobots 0` would set this state to false.

Troubleshooting
---

If you are experiencing issues with this module try reverting the feature first. If you are still experiencing issues try posting an issue on the GitHub issues page.

Contribution / Collaboration
---

You are welcome to contribute functionality, bug fixes, or documentation to this module. If you would like to suggest a fix or new functionality you may add a new issue to the GitHub issue queue or you may fork this repository and submit a pull request. For more help please see [GitHub's article on fork, branch, and pull requests](https://help.github.com/articles/using-pull-requests)


Releases
---

Steps to build a new release:
- Checkout the latest commit from the `8.x-2.x` branch.
- Create a new branch for the release.
- Commit any necessary changes to the release branch.
  -  These may include, but are not necessarily limited to:
    - Update the version in any `info.yml` files, including in any submodules.
    - Update the CHANGELOG to reflect the changes made in the new release.
- Make a PR to merge your release branch into `master`
- Give the PR a semver-compliant label, e.g., (`patch`, `minor`, `major`).  This may happen automatically via Github actions (if a labeler action is configured).
- When the PR is merged to `master`, a new tag will be created automatically, bumping the version by the semver label.
- The github action is built from: [semver-release-action](https://github.com/K-Phoen/semver-release-action), and further documentation is available there.
