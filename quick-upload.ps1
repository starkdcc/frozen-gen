# Quick GitHub Upload Script for Frozen Gen
# This script uploads all files to GitHub in one go

Write-Host "🧊 Frozen Gen - GitHub Upload Script" -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan

# Check if we're in the right directory
$currentPath = Get-Location
if ($currentPath -notlike "*frozen-gen-deploy*") {
    Write-Host "❌ Please run this script from the F:\frozen-gen-deploy folder" -ForegroundColor Red
    Write-Host "Current location: $currentPath" -ForegroundColor Yellow
    exit
}

# Check if git is installed
try {
    git --version | Out-Null
    Write-Host "✅ Git is installed" -ForegroundColor Green
} catch {
    Write-Host "❌ Git is not installed. Please install Git first:" -ForegroundColor Red
    Write-Host "   Download from: https://git-scm.com/download/windows" -ForegroundColor Yellow
    exit
}

# Get GitHub username
$username = Read-Host "Enter your GitHub username"
if ([string]::IsNullOrEmpty($username)) {
    Write-Host "❌ Username cannot be empty" -ForegroundColor Red
    exit
}

Write-Host "📂 Repository will be created at: https://github.com/$username/frozen-gen" -ForegroundColor Yellow

# Confirm before proceeding
$confirm = Read-Host "Continue? (y/n)"
if ($confirm -ne 'y' -and $confirm -ne 'Y') {
    Write-Host "❌ Upload cancelled" -ForegroundColor Red
    exit
}

Write-Host "🚀 Starting upload process..." -ForegroundColor Green

# Initialize git repository
Write-Host "📋 Initializing git repository..." -ForegroundColor Yellow
git init

# Add all files
Write-Host "📁 Adding all files..." -ForegroundColor Yellow
git add -A

# Check if there are files to commit
$status = git status --porcelain
if ([string]::IsNullOrEmpty($status)) {
    Write-Host "❌ No files to commit" -ForegroundColor Red
    exit
}

# Count files
$fileCount = ($status | Measure-Object).Count
Write-Host "✅ Found $fileCount files to upload" -ForegroundColor Green

# Commit files
Write-Host "💾 Committing files..." -ForegroundColor Yellow
git commit -m "Initial commit - Frozen Gen application ready for Railway deployment"

# Add remote origin
Write-Host "🔗 Adding GitHub remote..." -ForegroundColor Yellow
git remote add origin "https://github.com/$username/frozen-gen.git"

# Set main branch
Write-Host "🌿 Setting up main branch..." -ForegroundColor Yellow
git branch -M main

# Push to GitHub
Write-Host "⬆️  Uploading to GitHub..." -ForegroundColor Yellow
Write-Host "   (You may need to enter your GitHub credentials)" -ForegroundColor Cyan

try {
    git push -u origin main
    Write-Host "✅ SUCCESS! All files uploaded to GitHub!" -ForegroundColor Green
    Write-Host "🌐 Repository URL: https://github.com/$username/frozen-gen" -ForegroundColor Cyan
    Write-Host "🚂 Ready for Railway deployment!" -ForegroundColor Green
} catch {
    Write-Host "❌ Upload failed. This might be because:" -ForegroundColor Red
    Write-Host "   1. Repository already exists" -ForegroundColor Yellow
    Write-Host "   2. Authentication failed" -ForegroundColor Yellow
    Write-Host "   3. Network connection issue" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "💡 Try creating the repository manually on GitHub first:" -ForegroundColor Cyan
    Write-Host "   1. Go to https://github.com/new" -ForegroundColor White
    Write-Host "   2. Name it 'frozen-gen'" -ForegroundColor White
    Write-Host "   3. Make it public" -ForegroundColor White
    Write-Host "   4. Don't initialize with README" -ForegroundColor White
    Write-Host "   5. Run this script again" -ForegroundColor White
}

Write-Host ""
Write-Host "🎯 Next Steps:" -ForegroundColor Cyan
Write-Host "   1. Go to https://github.com/$username/frozen-gen" -ForegroundColor White
Write-Host "   2. Verify all files are uploaded" -ForegroundColor White
Write-Host "   3. Follow RAILWAY_STEPS.md for deployment" -ForegroundColor White

Read-Host "Press Enter to close"