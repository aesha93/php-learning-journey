link = https://www.freecodecamp.org/news/learn-the-basics-of-git-in-under-10-minutes-da548267cc91/
# 📒 Daily Notes – Git Basics  

## 🔹 What is Version Control?
Version control is a system that records changes to a file or set of files over time so that you can recall specific versions later. So ideally, we can place any file in the computer on version control.

## 🔹What is a Repository ?

A repository is nothing but a collection of source code.

There are four fundamental elements in the Git Workflow.

Working Directory, Staging Area, Local Repository and Remote Repository.


![alt text](image.png)


## 🔹 1. Branching Strategy (Concept)
- **Trunk-based**: work directly on `main`, use short-lived branches for features/bugfixes.  
- **Feature branching**: create a new branch per feature → merge later.  
- **Git Flow (classic)**:  
  - `main` → production  
  - `develop` → integration  
  - `feature/*` → new features  
  - `release/*` → prepare releases  
  - `hotfix/*` → urgent fixes  

👉 For beginners → stick to `main + feature branches`.

---

## 🔹 2. Git Status
- `git status` → verbose output (helpful for beginners).  
- `git status --short --branch` → compact, shows branch & file states.  

File states:
- `??` = untracked file  
- ` M` = modified but not staged  
- `A ` = staged new file  

---

## 🔹 3. Git Add
- Stage files for commit.  
```bash
git add file.txt   # stage one file
git add .          # stage all changes
````

---

## 🔹 4. Git Commit

* Save staged changes into history.

```bash
git commit -m "message"
```

Good commit message prefixes:

* `feat:` (new feature)
* `fix:` (bug fix)
* `docs:` (documentation)
* `chore:` (maintenance)

---

## 🔹 5. Git Push & Pull

* Push: send commits to remote.

```bash
git push origin main
```

* Pull: fetch + merge remote changes.

```bash
git pull origin main
```

---

## 🔹 6. Git Checkout / Switch Branch

* Create and switch to a new branch:

```bash
git checkout -b feature/login
```

* Switch back to main:

```bash
git checkout main
```

* (New command)

```bash
git switch feature/login
```

---

## 🔹 7. Git Stash

Temporarily save work without committing.

```bash
git stash           # save changes
git stash list      # view stash entries
git stash pop       # apply + remove latest stash
```

---

## 🔹 8. .gitignore

Tell Git which files/folders to ignore.

Example `.gitignore`:

```
node_modules/
secret.txt
*.log
```

Ignored files will not show up in `git status`.

---
## 🔹 9. Git log

* View commit history:

```bash
git log --oneline
```

Helps you see the timeline of your project.

## 🔹 10. Git Merge & Conflict Resolution

* Merge branch into main:

```bash
git checkout main
git merge feature/login
```

* If conflict happens, file will contain markers:

```
<<<<<<< HEAD
code from main
=======
code from feature
>>>>>>> feature/login
```

* Fix manually → then run:

```bash
git add conflict-file.txt
git commit -m "resolve merge conflict"
```


## 🔹 11. Git branch

* 👉 Create and manage branches.

```bash
git branch feature-login   # create new branch
git checkout feature-login # switch to branch
```
## 🔹 11. Git merge

👉 Combine one branch into another.

```bash
git checkout main
git merge feature-login
```
If both branches edited the same file → conflict arises.

## 🔹 12.Git remote & git push

👉 Connect to GitHub and push changes.

```bash
git remote add origin https://github.com/username/repo.git
git push origin main
```

Sends local commits to GitHub.

## 🔹 12.Git pull

👉 Get the latest updates from GitHub.

```bash
git pull origin main
```
Merges remote changes into your branch.

## 🔹 13. .gitignore

👉 Ignore files you don’t want in Git (e.g., node_modules, .env).
Example .gitignore:

```bash
node_modules/
.env
*.log
```

## 🔹 14.Git revert

git revert is used to undo a commit by creating a new commit that reverses the changes made in a previous commit.

Unlike git reset (which changes history), git revert is safe for shared repositories because it doesn’t remove commits from history—it just adds a new one.


```bash
git revert <commit_hash>
```

example :
Suppose you want to undo the commit 
"Added new login feature" (a1b2c3d):

```bash
git revert a1b2c3d
```

## 🔹15. Key Difference (Revert vs Reset)

git reset → Removes commit history (dangerous for shared repos).

git revert → Creates a new commit that undoes changes (safe for teams).

## . What is git reset?

git reset is a Git command used to move the HEAD (your current branch pointer) and optionally modify the staging area (index) and working directory.
It is mainly used to undo changes.

## .Three Types of Git Reset

## 1. git reset --soft <commit>

Moves HEAD to the given commit.

Keeps changes in staging area (index) and working directory.

Useful when you want to redo commits but keep staged changes.

Example:

```bash
git reset --soft HEAD~1
```

Undo the last commit.

The files remain staged, ready to be committed again.

## 2.git reset --mixed <commit> (default)

Moves HEAD to the given commit.

Keeps changes in working directory.

Clears staging area.

Default behavior if you run just git reset.

Example:

```bash
git reset HEAD~1
```
Undo the last commit.

Files remain in working directory, unstaged.

## 3. git reset --hard <commit>

Moves HEAD to the given commit.

Clears staging area.

Clears working directory.

⚠️ Deletes all changes permanently (dangerous if not backed up).

Example:

```bash
git reset --hard HEAD~1
```

Completely removes the last commit and related changes.

## 🔹 Quick Comparison

| Command   | Effect on Commit History | Staging Area | Working Directory |
| --------- | ------------------------ | ------------ | ----------------- |
| `--soft`  | Moves HEAD only          | Kept         | Kept              |
| `--mixed` | Moves HEAD               | Cleared      | Kept              |
| `--hard`  | Moves HEAD               | Cleared      | Cleared (deleted) |
