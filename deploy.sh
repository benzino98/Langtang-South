#!/bin/bash
# -----------------------------------------------------------------------------
# Langtang South Local Government Council - Automated Git Push & Deploy Script
# -----------------------------------------------------------------------------

set -e

# Default commit message if none provided
COMMIT_MSG="${1:-Update and prepare deployment}"

echo "=========================================================="
echo "🚀 Langtang South LGA - Pushing to GitHub Deployment CI/CD"
echo "=========================================================="
echo ""

# 1. Check for uncommitted changes
if [ -n "$(git status --porcelain)" ]; then
    echo "📦 Staging changes..."
    git add .
    echo "📝 Committing: \"$COMMIT_MSG\""
    git commit -m "$COMMIT_MSG"
else
    echo "ℹ️  No uncommitted local changes detected."
fi

# 2. Push to GitHub main branch
echo "📤 Pushing to GitHub (origin main)..."
git push origin main

echo ""
echo "=========================================================="
echo "✅ Code successfully pushed to GitHub!"
echo "🔄 GitHub Actions is now building and deploying your site."
echo "🔗 View pipeline progress at: https://github.com/benzino98/Langtang-South/actions"
echo "=========================================================="
