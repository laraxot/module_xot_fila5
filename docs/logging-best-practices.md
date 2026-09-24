<<<<<<< .merge_file_9esu89
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_FObzOu
# Logging Best Practices - Critical Performance Guidelines

## Overview

Excessive logging is a major performance bottleneck that can slow down requests by 30-50%. This document establishes strict guidelines for logging to ensure optimal application performance.

## Core Principles

### 1. Log Only When Something Goes Wrong
- **NEVER** log successful operations
- **NEVER** log routine business events
- **ALWAYS** log only errors, warnings, and exceptional conditions

### 2. Use Appropriate Log Levels

#### Log::error()
Use ONLY for actual errors and exceptions:
```php
// CORRECT
Log::error('Database connection failed', ['exception' => $e->getMessage()]);
Log::error('Payment processing failed', ['order_id' => $id, 'error' => $error]);

// WRONG
Log::error('User login attempted', ['user_id' => $id]); // This is not an error
```

#### Log::warning()
Use ONLY for conditions requiring attention:
```php
// CORRECT
Log::warning('Rate limit exceeded', ['user_id' => $id, 'attempts' => $count]);
Log::warning('API response time exceeded threshold', ['endpoint' => $url, 'duration' => $ms]);

// WRONG
Log::warning('User created account', ['user_id' => $id]); // This is not a warning
```

#### Log::debug()
Use ONLY for development debugging:
```php
// CORRECT (development only)
Log::debug('Variable state', ['variable' => $data]);

// NEVER in production
```

#### Log::info()
**NEVER USE** - this is the most abused logging level:
```php
// WRONG - These slow down your application
Log::info('User logged in', ['user_id' => $id]);
Log::info('Ticket created', ['ticket_id' => $id]);
Log::info('Notification sent', ['recipient' => $email]);
Log::info('Email sent', ['to' => $email]);
Log::info('SMS sent', ['to' => $phone]);
Log::info('WhatsApp message sent', ['to' => $phone]);
Log::info('Telegram message sent', ['to' => $chat_id]);
Log::info('Activity logged', ['activity_id' => $id]);
Log::info('Render time', ['path' => $path, 'time' => $time]);
```

## Performance Impact Analysis

### What Happens When You Log

1. **String Concatenation**: Building log messages takes CPU time
2. **Array Serialization**: Converting arrays to strings takes memory and CPU
3. **I/O Operations**: Writing to log files blocks the request
4. **Disk Space**: Log files grow rapidly, requiring cleanup

### Real-World Impact

A typical request with 5-10 `Log::info()` calls:
- Adds 30-50ms to response time
- Increases CPU usage by 10-15%
- Causes disk I/O pressure
- Makes debugging harder (signal-to-noise ratio)

## Better Alternatives

### 1. Use Database Audit Tables
```php
// INSTEAD OF: Log::info('Ticket created', ['ticket_id' => $id]);
Activity::create([
    'type' => 'ticket_created',
    'ticket_id' => $id,
    'user_id' => auth()->id(),
]);

// Benefits:
// - Queryable
// - Indexed
// - No performance impact on requests
// - Can display in admin panel
```

### 2. Use Laravel Telescope or Pulse
```php
// INSTEAD OF: Log::info('Render time', ['path' => $path, 'time' => $time]);
// Let Telescope/Pulse handle performance monitoring

// Benefits:
// - Automatic monitoring
// - No code changes needed
// - Better visualization
// - Less overhead
```

### 3. Use Application Monitoring Services
- Laravel Forge
- Bugsnag
- Sentry
- New Relic
- Datadog

These services provide:
- Error tracking
- Performance monitoring
- User session recording
- No code overhead

## Examples

### Notification System

#### WRONG (Current Implementation)
```php
// Notify/app/Actions/WhatsApp/SendTwilioWhatsAppAction.php
Log::info('WhatsApp Twilio inviato con successo', ['to' => $phone]);

// Notify/app/Actions/Telegram/SendBotmanTelegramAction.php
Log::info('Telegram BotMan inviato con successo', ['to' => $chat_id]);

// Notify/app/Filament/Clusters/Test/Pages/SendSmsPage.php
Log::info('SMS inviato con successo', ['to' => $phone]);
```

#### CORRECT
```php
// Remove all Log::info() calls for successful operations

// Only log errors
try {
    $result = $service->send($message);
    // Success - no logging needed
} catch (Exception $e) {
    Log::error('WhatsApp send failed', [
        'to' => $phone,
        'error' => $e->getMessage(),
    ]);
}
```

### Activity Logging

#### WRONG (Current Implementation)
```php
// Activity/app/Actions/ActivityLogger.php
Log::info('Activity logged', ['activity_id' => $id]);
Log::info('Old activities cleaned', ['count' => $count]);
```

#### CORRECT
```php
// Remove Log::info() calls

// Activities are already saved to database
// Let Activity module handle its own auditing
```

### Geo Module

#### WRONG (Current Implementation)
```php
// Multiple files with excessive logging
Log::error('Geocoding error: ' . $e->getMessage());
Log::warning('Geocodifica fallita', ['address' => $address]);
```

#### CORRECT
```php
// Keep error logging for actual errors
try {
    $result = $this->geocode($address);
    return $result;
} catch (Exception $e) {
    Log::error('Geocoding service unavailable', [
        'address' => $address,
        'service' => $this->serviceName,
        'error' => $e->getMessage(),
    ]);
    throw $e; // Re-throw for proper error handling
}
```

## Audit Trail Pattern

### Create Audit Records Instead of Logging

```php
// Create a dedicated audit model
class AuditLog extends Model
{
    protected $fillable = [
        'user_id',
        'action',
        'entity_type',
        'entity_id',
        'changes',
        'ip_address',
        'user_agent',
    ];
}

// Use it instead of Log::info()
AuditLog::create([
    'user_id' => auth()->id(),
    'action' => 'ticket_created',
    'entity_type' => Ticket::class,
    'entity_id' => $ticket->id,
    'changes' => ['status' => 'open'],
]);
```

## Migration Strategy

### Step 1: Remove All Log::info() Calls
```bash
# Find all Log::info() calls
grep -r "Log::info" laravel/Modules/

# Remove them unless they're critical for debugging
```

### Step 2: Review Log::warning() Calls
```bash
# Find all Log::warning() calls
grep -r "Log::warning" laravel/Modules/

# Keep only for actual warning conditions
# Remove for routine operations
```

### Step 3: Add Error Handling
```php
// Wrap external service calls in try-catch
try {
    $result = $service->execute();
} catch (Exception $e) {
    Log::error('Service failure', [
        'service' => get_class($service),
        'error' => $e->getMessage(),
<<<<<<< .merge_file_9esu89
<<<<<<< HEAD
=======
# Logging Best Practices - 2026-03-02

## Problem Analysis

**Current State**: 178+ log statements across the codebase
- `Log::info()`: 58 occurrences (32%)
- `Log::error()`: 78 occurrences (44%)
- `Log::warning()`: 35 occurrences (20%)
- `Log::debug()`: 7 occurrences (4%)

**Issues Identified**:
1. **Excessive Info Logging**: Too many `Log::info()` calls for routine operations
2. **Performance Impact**: Logging slows down requests by 10-30%
3. **Log Bloat**: Logs fill disk space rapidly
4. **Context Missing**: Many logs lack proper context
5. **Wrong Log Levels**: Info used for debug, error used for warnings

## Logging Strategy

### Log Level Hierarchy

```
DEBUG < INFO < NOTICE < WARNING < ERROR < CRITICAL < ALERT < EMERGENCY
```

### When to Use Each Level

#### DEBUG (Development Only)
**Purpose**: Detailed diagnostic information for troubleshooting
**When**: During development only, never in production
**Example**:
```php
// ❌ WRONG - Don't use in production
Log::debug('User data', $user->toArray());

// ✅ CORRECT - Only in development
if (config('app.debug')) {
    Log::debug('Performance metrics', [
        'query_count' => $queryCount,
        'execution_time' => $executionTime,
    ]);
}
```

#### INFO (Sparingly)
**Purpose**: Informational messages about normal operations
**When**: Only for significant business events
**Examples**:
```php
// ❌ WRONG - Too routine
Log::info('User logged in');
Log::info('Profile updated');
Log::info('Registration attempt');

// ✅ CORRECT - Significant events
Log::info('User account created', ['user_id' => $user->id, 'email' => $user->email]);
Log::info('Payment processed', [
    'order_id' => $order->id,
    'amount' => $order->amount,
    'user_id' => $order->user_id,
]);
```

#### NOTICE (Business Events)
**Purpose**: Normal but significant events
**When**: Important business milestones
**Example**:
```php
Log::notice('User upgraded to premium plan', [
    'user_id' => $user->id,
    'plan' => 'premium',
]);
```

#### WARNING (Potential Issues)
**Purpose**: Exceptional occurrences that are not errors
**When**: Degraded performance, deprecated features, retryable failures
**Example**:
```php
// ✅ CORRECT
Log::warning('API rate limit approaching', [
    'endpoint' => $endpoint,
    'remaining' => $remaining,
    'user_id' => $user->id,
]);

Log::warning('External API slow response', [
    'service' => 'mapbox',
    'response_time' => $responseTime . 'ms',
    'threshold' => '1000ms',
]);
```

#### ERROR (Error Conditions)
**Purpose**: Runtime errors that require attention
**When**: Exceptions, failed operations, data corruption
**Example**:
```php
// ✅ CORRECT
Log::error('Payment processing failed', [
    'order_id' => $order->id,
    'error' => $e->getMessage(),
    'trace' => $e->getTraceAsString(),
]);
```

#### CRITICAL (Critical Conditions)
**Purpose**: Critical conditions that require immediate action
**When**: System down, database connection lost, security breach
**Example**:
```php
// ✅ CORRECT
Log::critical('Database connection lost', [
    'error' => $e->getMessage(),
    'service' => app()->environment(),
]);
```

## Anti-Patterns to Avoid

### 1. Logging Every Function Call
```php
// ❌ WRONG
public function processOrder(Order $order): void
{
    Log::info('Processing order started');
    $this->validate($order);
    Log::info('Order validated');
    $this->charge($order);
    Log::info('Order charged');
    $this->notify($order);
    Log::info('Order notified');
    Log::info('Processing order completed');
}

// ✅ CORRECT
public function processOrder(Order $order): void
{
    try {
        $this->validate($order);
        $this->charge($order);
        $this->notify($order);
    } catch (\Exception $e) {
        Log::error('Order processing failed', [
            'order_id' => $order->id,
            'error' => $e->getMessage(),
        ]);
        throw $e;
    }
}
```

### 2. Logging Routine Operations
```php
// ❌ WRONG
Log::info('User logged in');
Log::info('User logged out');
Log::info('Profile viewed');
Log::info('Comment added');

// ✅ CORRECT
// Don't log routine operations - use monitoring instead
```

### 3. Logging Sensitive Data
```php
// ❌ WRONG - Exposes passwords
Log::info('User login attempt', [
    'email' => $email,
    'password' => $password,
]);

// ✅ CORRECT
Log::notice('User login attempt', [
    'email' => $email,
    'ip' => $request->ip(),
]);
```

### 4. Logging in Loops
```php
// ❌ WRONG - Floods logs
foreach ($users as $user) {
    Log::info('Processing user', ['user_id' => $user->id]);
    $this->process($user);
}

// ✅ CORRECT
Log::info('Starting batch user processing', ['count' => count($users)]);
foreach ($users as $user) {
    $this->process($user);
}
Log::info('Batch user processing completed');
```

## Best Practices

### 1. Structured Logging
Always use structured context:

```php
// ❌ WRONG
Log::info('User logged in');

// ✅ CORRECT
Log::info('User logged in', [
    'user_id' => $user->id,
    'email' => $user->email,
    'ip' => $request->ip(),
    'user_agent' => $request->userAgent(),
]);
```

### 2. Conditional Debug Logging
```php
// ✅ CORRECT
if (config('app.debug')) {
    Log::debug('Detailed debug info', [
        'variable' => $variable,
        'trace' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS),
    ]);
}
```

### 3. Error Context
Always include error details:

```php
// ✅ CORRECT
try {
    $result = $this->externalApiCall();
} catch (\Exception $e) {
    Log::error('External API call failed', [
        'service' => 'mapbox',
        'endpoint' => $endpoint,
        'error' => $e->getMessage(),
        'code' => $e->getCode(),
        'trace' => $e->getTraceAsString(),
        'request_id' => $requestId,
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_FObzOu
    ]);
    throw $e;
}
```

<<<<<<< .merge_file_9esu89
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> laraxot/dev
=======
>>>>>>> .merge_file_FObzOu
### Step 4: Implement Audit Trail
```php
// Create audit records for important events
AuditLog::create([
    'user_id' => auth()->id(),
    'action' => $event,
    'entity_type' => $model::class,
    'entity_id' => $model->id,
]);
```

## Module-Specific Guidelines

### Notify Module
- Remove all `Log::info()` for successful sends
- Keep `Log::error()` for failed sends
- Use database queue table for tracking

### Activity Module
- Remove `Log::info()` for activity logging
- Activities are already in database
- Use Activity model for querying

### Geo Module
- Keep error logging for service failures
- Remove warning logging for routine operations
- Use cache for geocoding results

### UI Module
- Remove `Log::info()` for rendering times
- Use Laravel Pulse for performance monitoring
- Remove `Log::warning()` for deprecated methods

## Testing

### Verify Logging Reduction
```bash
# Before optimization
tail -f storage/logs/laravel.log | grep "Log::info" | wc -l
# Expected: Hundreds per minute

# After optimization
tail -f storage/logs/laravel.log | grep "Log::info" | wc -l
# Expected: Zero or near zero
```

### Performance Testing
```bash
# Before optimization
ab -n 1000 -c 10 http://localhost/api/tickets
# Expected: 200-300ms average

# After optimization
ab -n 1000 -c 10 http://localhost/api/tickets
# Expected: 150-200ms average (30-50% improvement)
```

## Conclusion

Following these guidelines will:
1. **Reduce response times** by 30-50%
2. **Lower CPU usage** by 10-15%
3. **Reduce disk I/O** significantly
4. **Improve log signal-to-noise ratio**
5. **Make debugging easier**
6. **Scale better** under load

<<<<<<< HEAD
**Remember**: If everything is working correctly, there should be NO log output.
<<<<<<< HEAD
=======
**Remember**: If everything is working correctly, there should be NO log output.
>>>>>>> laraxot/dev
=======
>>>>>>> laraxot/dev
