# PR Instructions for git-study-agent

This file contains instructions and templates the git-study-agent uses when creating pull requests in this repository.

## PR Title Convention

Format: `<type>: <short description>`

Where `<type>` is one of:

- `study` — new learning material or exercises
- `notes` — notes or documentation updates
- `fix` — corrections to previous work
- `refactor` — reorganization without content changes

Example: `study: complete Linux filesystem chapter exercises`

## PR Body Template

The PR body should have three sections, in this order:

### Summary

One paragraph describing what this PR includes overall.

### Changes

A bullet list of the key changes. Generate this from the git log of commits being merged.

### Notes

Any context, blockers, or things the reviewer should pay special attention to. If there's nothing to note, write "None."

## Additional Conventions

- Keep PR titles under 72 characters.
- Reference any related issues with `#<number>` in the body.
- If the PR is a work-in-progress, prefix the title with `[WIP]`.
- Use present tense in titles and descriptions ("add chapter notes" not "added chapter notes").
